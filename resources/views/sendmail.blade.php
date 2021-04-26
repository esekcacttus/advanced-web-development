<center>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
