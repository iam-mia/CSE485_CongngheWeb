<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $viewTitle ?? 'Website Của Tôi' }}</title>
        <style>
            body { font-family: sans-serif; }
            .container { max-width: 960px; margin: 0 auto; padding: 20px; }
            header, footer { background-color: #f4f4f4; padding: 10px; text-align: center; }
            nav { background-color: #333; color: white; padding: 10px; }
            nav a { color: white; margin: 0 10px; }
            table { border: 1px solid #333}
            table { width: 100%; border-collapse: collapse; margin-bottom: 20px;}
            table th, table td { border: 1px solid #ccc; padding: 8px 12px; text-align: left;}
            table th { background-color: #333; color: white; }
            table tr:nth-child(even) { background-color: #f2f2f2; }
            form { margin-top: 20px; }
            form input { padding: 8px; margin-right: 10px; border: 1px solid #ccc; border-radius: 4px;}
            form button {
                padding: 8px 15px;
                background-color: #28a745;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            form button:hover {
            background-color: #218838;
            }     
        </style>
    </head>
    <body>
        <header>
            <h1>Trang Web CSE485 - Chương 9</h1>
        </header>
        <nav>
            <a href="/">Trang Chủ</a>
            <a href="/about">Giới Thiệu</a>
        </nav>
        <div class="container">
            @yield('content')
        </div>
        <footer><p>&copy; 2025 - Khoa CNTT - Trường Đại học Thủy Lợi</p>
        </footer>
    </body>
</html>