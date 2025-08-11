<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - UC Silver</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#8e6f2e",
              "primary-dark": "#6b5423",
              "primary-light": "#a68235",
              "primary-lighter": "#d4af37",
              dark: "#010101",
              "dark-light": "#1a1a1a",
              "brown-dark": "#4a3728",
              "brown-medium": "#6b4e37",
              "brown-light": "#8b6f47",
            },
            fontFamily: {
              serif: ["Playfair Display", "serif"],
              sans: ["Inter", "sans-serif"],
            },
          },
        },
      };
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <style>
      .gradient-text {
        background: linear-gradient(135deg, #8e6f2e, #a68235, #d4af37);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
      }

      .jewelry-glow {
        box-shadow: 0 0 30px rgba(142, 111, 46, 0.3);
      }

      .floating {
        animation: floating 3s ease-in-out infinite;
      }

      @keyframes floating {
        0%,
        100% {
          transform: translateY(0px);
        }

        50% {
          transform: translateY(-10px);
        }
      }

      .shine {
        position: relative;
        overflow: hidden;
      }

      .shine::before {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
      }

      .shine:hover::before {
        left: 100%;
      }

      .product-card {
        background: linear-gradient(135deg, #8e6f2e, #6b5423, #4a3728);
        position: relative;
        overflow: hidden;
      }

      .product-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
        transform: translateX(-100%);
        transition: transform 0.6s;
      }

      .product-card:hover::before {
        transform: translateX(100%);
      }

      .price-tag {
        background: linear-gradient(135deg, #d4af37, #8e6f2e);
        color: #010101;
        font-weight: bold;
      }

      .product-overlay {
        background: linear-gradient(to top, rgba(142, 111, 46, 0.9), transparent);
      }
    </style>
  </head>
  <body class="bg-dark text-white font-sans min-h-screen flex items-center justify-center">
    @yield('content') 
  </body>
</html>
