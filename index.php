<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Send Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            margin-top: 10px;
        }

        input[type=email], input[type=text] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box; /* Ensures padding doesn't affect overall width */
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="send.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter recipient's email" required>

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" placeholder="Enter email subject" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" placeholder="Write your message here" rows="4" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ddd; box-sizing: border-box;"></textarea>

        <button type="submit" name="send">Send Email</button>
    </form>
</body>
</html>