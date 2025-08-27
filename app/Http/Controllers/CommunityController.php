<?php

namespace App\Http\Controllers;

// Models
use App\Models\BankAccount;
use App\Models\Community;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $communities = Community::all();
        $viewData = [
            'communities' => $communities,
        ];
        return view('admin.communities.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.communities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'account_number' => 'required|string|max:50',
            'account_name' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'bank_code' => 'required|string|max:50',
        ]);

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('communities', 'public');
                $validated['image'] = $imagePath;
            }
            $communityData = [
                'name' => $validated['name'],
                'description' => $validated['description'],
                'image' => $validated['image'] ?? null,
            ];

            $community = Community::create($communityData);

            $bankAccountData = [
                'community_id' => $community->id,
                'account_number' => $validated['account_number'],
                'account_name' => $validated['account_name'],
                'bank_name' => $validated['bank_name'],
                'bank_code' => $validated['bank_code'],
            ];

            $bankAccount = BankAccount::create($bankAccountData);

            DB::commit();
            return redirect()->route('admin.communities.index')->with('success', 'Community created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Failed to create community: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $community = Community::findOrFail($id);
        return view('admin.communities.show', compact('community'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $community = Community::findOrFail($id);
        return view('admin.communities.edit', compact('community'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'account_number' => 'required|string|max:50',
            'account_name' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'bank_code' => 'required|string|max:50',
        ]);

        try {
            DB::beginTransaction();

            $community = Community::findOrFail($id);

            // Handle image update
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($community->image) {
                    \Storage::disk('public')->delete($community->image);
                }
                $imagePath = $request->file('image')->store('communities', 'public');
                $validated['image'] = $imagePath;
            }

            // Update community
            $community->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'image' => $validated['image'] ?? $community->image,
            ]);

            // Update or create bank account
            $bankAccountData = [
                'account_number' => $validated['account_number'],
                'account_name' => $validated['account_name'],
                'bank_name' => $validated['bank_name'],
                'bank_code' => $validated['bank_code'],
            ];

            $bankAccount = BankAccount::where('community_id', $community->id)->first();
            if ($bankAccount) {
                $bankAccount->update($bankAccountData);
            } else {
                $bankAccountData['community_id'] = $community->id;
                BankAccount::create($bankAccountData);
            }

            DB::commit();
            return redirect()->route('admin.communities.index')->with('success', 'Community updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Failed to update community: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $community = Community::findOrFail($id);

            // Delete the image file if exists
            if ($community->image) {
                \Storage::disk('public')->delete($community->image);
            }

            $community->delete();
            DB::commit();
            return redirect()->route('admin.communities.index')->with('success', 'Community deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Failed to delete community: ' . $e->getMessage());
        }
    }
}
