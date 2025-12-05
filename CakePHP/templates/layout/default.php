<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?> - CMS CakePHP
    </title>
    <?= $this->Html->meta('icon') ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 0;
            color: #333;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        nav {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 0;
            margin-bottom: 30px;
            border-radius: 0 0 10px 10px;
        }
        
        nav .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        
        nav .logo {
            font-size: 24px;
            font-weight: bold;
            color: #667eea;
            text-decoration: none;
        }
        
        nav .menu {
            display: flex;
            gap: 20px;
        }
        
        nav a {
            color: #333;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 5px;
            transition: all 0.3s;
            font-weight: 500;
        }
        
        nav a:hover {
            background: #667eea;
            color: white;
        }
        
        main {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            padding: 30px;
            margin-bottom: 30px;
        }
        
        h1 {
            color: #667eea;
            margin-bottom: 20px;
            font-size: 32px;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        
        .btn:hover {
            background: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .btn-secondary {
            background: #6c757d;
        }
        
        .btn-secondary:hover {
            background: #5a6268;
        }
        
        .btn-danger {
            background: #dc3545;
        }
        
        .btn-danger:hover {
            background: #c82333;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
        }
        
        td {
            padding: 15px;
            border-bottom: 1px solid #e9ecef;
        }
        
        tr:hover {
            background: #f8f9fa;
        }
        
        tr:last-child td {
            border-bottom: none;
        }
        
        a {
            color: #667eea;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        a:hover {
            color: #764ba2;
            text-decoration: underline;
        }
        
        .actions {
            display: flex;
            gap: 10px;
        }
        
        .actions a {
            padding: 5px 12px;
            border-radius: 3px;
            font-size: 13px;
        }
        
        .actions .edit {
            background: #28a745;
            color: white;
        }
        
        .actions .edit:hover {
            background: #218838;
            text-decoration: none;
        }
        
        .actions .delete {
            background: #dc3545;
            color: white;
        }
        
        .actions .delete:hover {
            background: #c82333;
            text-decoration: none;
        }
        
        .tag {
            display: inline-block;
            background: #e9ecef;
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 12px;
            margin-right: 5px;
            color: #495057;
        }
        
        .tag:hover {
            background: #667eea;
            color: white;
            text-decoration: none;
        }
        
        .flash-message {
            padding: 15px 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            border-left: 4px solid;
        }
        
        .flash-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #28a745;
        }
        
        .flash-error {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #dc3545;
        }
        
        .empty-message {
            text-align: center;
            padding: 40px;
            color: #6c757d;
            font-style: italic;
        }
        
        form {
            max-width: 600px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #495057;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e9ecef;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
            font-family: inherit;
        }
        
        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        textarea {
            resize: vertical;
            min-height: 150px;
        }
        
        input[type="checkbox"] {
            width: auto;
            margin-right: 8px;
            cursor: pointer;
        }
        
        .checkbox {
            margin: 10px 0;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 5px;
        }
        
        .checkbox label {
            font-weight: normal;
            cursor: pointer;
            display: flex;
            align-items: center;
        }
        
        footer {
            text-align: center;
            padding: 20px;
            color: white;
            font-size: 14px;
        }
        
        .form-control {
            width: 100%;
            padding: 12px;
            border: 2px solid #e9ecef;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
            font-family: inherit;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .error-message {
            color: #dc3545;
            font-size: 13px;
            margin-top: 5px;
        }
        
        .input.error input,
        .input.error textarea,
        .input.error select {
            border-color: #dc3545;
        }
        
        .input.error input:focus,
        .input.error textarea:focus,
        .input.error select:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1);
        }
        
        .input {
            margin-bottom: 20px;
        }
        
        .input label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #495057;
        }
        
        .input.checkbox {
            margin: 10px 0;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 5px;
        }
        
        .input.checkbox label {
            font-weight: normal;
            cursor: pointer;
            display: flex;
            align-items: center;
            margin-bottom: 0;
        }
        
        .input.checkbox input[type="checkbox"] {
            width: auto;
            margin-right: 8px;
            cursor: pointer;
        }
        
        .paginator {
            margin-top: 30px;
            text-align: center;
        }
        
        .pagination {
            display: inline-flex;
            list-style: none;
            padding: 0;
            gap: 5px;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .pagination li {
            display: inline-block;
        }
        
        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            color: #667eea;
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            transition: all 0.3s;
        }
        
        .pagination a:hover {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }
        
        .pagination .current {
            background: #667eea;
            color: white;
            border-color: #667eea;
            font-weight: bold;
        }
        
        .pagination .disabled {
            color: #6c757d;
            background: #e9ecef;
            border-color: #dee2e6;
            cursor: not-allowed;
        }
        
        .paginator p {
            margin-top: 15px;
            color: #6c757d;
            font-size: 14px;
        }
    </style>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav>
        <div class="container">
            <a href="<?= $this->Url->build('/') ?>" class="logo">🍰 CMS CakePHP</a>
            <div class="menu">
                <a href="<?= $this->Url->build('/') ?>">Inicio</a>
                <a href="<?= $this->Url->build('/users') ?>">Usuarios</a>
                <a href="<?= $this->Url->build('/articles') ?>">Artículos</a>
                <a href="<?= $this->Url->build('/tags') ?>">Etiquetas</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <main>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </main>
    </div>
    <footer>
        <p>&copy; <?= date('Y') ?> CMS CakePHP - Sistema de Gestión de Contenidos</p>
    </footer>
</body>
</html>

