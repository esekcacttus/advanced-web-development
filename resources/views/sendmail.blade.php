<center>
    <form method="POST" action="{{route('mail.sendMail')}}">
        @csrf
        <label>To:</label><br>
        <input name="to" type="email"><br><br>

        <label>Message:</label><br>
        <textarea name="message"></textarea><br>
        <br>
        <button type="submit">Send</button>
    </form>
</center>
