<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Card</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            block-size: 100vh;
            margin: 0;
        }
        .feedback-card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            inline-size: 350px;
            padding: 25px;
            text-align: center;
        }
        .feedback-card h2 {
            margin-block-end: 15px;
            color: #333333;
        }
        .feedback-card p {
            color: #585758;
            font-size: 15px;
            margin-block-end: 30px;
        }
        .emojis {
            display: flex;
            justify-content: space-between;
            margin-block-end: 20px;
        }
        .emoji {
            cursor: pointer;
            font-size: 30px;
            transition: transform 0.3s, color 0.3s, filter 0.3s;
            color: #cccccc;
        }
        .emoji:hover {
            transform: scale(1.3);
            filter: grayscale(0);
            color: inherit;
        }
        .emoji.selected {
            transform: scale(1.3);
            color: #ffcc00;
        }
        .comment-box {
            inline-size: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #dddddd;
            border-radius: 8px;
            margin-block-end: 20px;
            resize: none;
            font-size: 14px;
            font-family: inherit;
            outline: none;
        }
        .submit-btn {
            background: linear-gradient(45deg, #4caf50, #388e3c);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            inline-size: 100%;
            font-size: 18px;
            transition: background-color 0.3s;
        }
        .submit-btn:hover {
            background: linear-gradient(-63deg, #03f00f, #2e7d32);
        }
    </style>
</head>
<body>
    <div class="feedback-card">
        <h2>Feedback</h2>
        
        <form action="{{ route('order.submitFeedback', ['order_id' => $order->id]) }}" method="POST">
            @csrf
            <div class="emojis">
                <span class="emoji" data-value="😢">😢</span>
                <span class="emoji" data-value="😞">😞</span>
                <span class="emoji" data-value="😐">😐</span>
                <span class="emoji" data-value="🙂">🙂</span>
                <span class="emoji" data-value="🥰">🥰</span>
            </div>
            <!-- Hidden input to capture selected emoji -->
            <input type="hidden" name="emoji" id="selectedEmoji">
            <textarea name="comment" class="comment-box" placeholder="Add a Comment..." required></textarea>
            <button type="submit" class="submit-btn">Submit Now</button>
        </form>
    </div>



    <script>
        const emojis = document.querySelectorAll('.emoji');
        const selectedEmojiInput = document.getElementById('selectedEmoji');

        emojis.forEach(emoji => {
            emoji.addEventListener('click', () => {
                // Remove the "selected" class from all emojis
                emojis.forEach(e => e.classList.remove('selected'));
                // Add the "selected" class to the clicked emoji
                emoji.classList.add('selected');
                // Set the selected emoji value in the hidden input
                selectedEmojiInput.value = emoji.getAttribute('data-value');
            });
        });
    </script>
</body>
</html>
