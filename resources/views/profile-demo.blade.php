<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile API Demo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 760px;
            margin: 40px auto;
            line-height: 1.4;
            padding: 0 16px;
        }
        .card {
            border: 1px solid #d0d7de;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: 600;
        }
        input, select, button {
            margin-top: 6px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            cursor: pointer;
            margin-top: 14px;
        }
        pre {
            background: #f6f8fa;
            padding: 12px;
            border-radius: 6px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <h1>Profile API Demo</h1>
    <p>Эта страница вызывает ваши API-методы для регистрации и просмотра профиля.</p>

    <div class="card">
        <h2>Регистрация пользователя</h2>
        <form id="registration-form">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" required>

            <label for="password">Password</label>
            <input id="password" name="password" type="password" minlength="8" required>

            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="male">Мужской</option>
                <option value="female">Женский</option>
                <option value="other">Другое</option>
            </select>

            <button type="submit">Регестрация</button>
        </form>
    </div>

    <div class="card">
        <h2>Просмотр профиля по ID</h2>
        <form id="profile-form">
            <label for="profile-id">User ID</label>
            <input id="profile-id" name="profile-id" type="number" min="1" required>

            <button type="submit">Получить данные</button>
        </form>
    </div>

    <div class="card">
        <h2>Ответ API</h2>
        <pre id="result">Здесь будет JSON-ответ...</pre>
    </div>

    <script>
        const result = document.getElementById('result');

        const printResult = async (response) => {
            let payload;
            try {
                payload = await response.json();
            } catch (error) {
                payload = { message: 'Invalid JSON response' };
            }

            result.textContent = JSON.stringify(
                {
                    status: response.status,
                    ok: response.ok,
                    data: payload
                },
                null,
                2
            );
        };

        document.getElementById('registration-form').addEventListener('submit', async (event) => {
            event.preventDefault();

            const response = await fetch('/api/registration', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    email: document.getElementById('email').value,
                    password: document.getElementById('password').value,
                    gender: document.getElementById('gender').value
                })
            });

            await printResult(response);
        });

        document.getElementById('profile-form').addEventListener('submit', async (event) => {
            event.preventDefault();

            const userId = document.getElementById('profile-id').value;
            const response = await fetch(`/api/profile/${userId}`);

            await printResult(response);
        });
    </script>
</body>
</html>
