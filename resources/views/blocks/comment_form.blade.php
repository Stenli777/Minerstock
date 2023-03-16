    <form action="{{\URL::current()}}/comment" method="POST">
        @csrf
        <input type="text" name="email">
        <textarea name="content"></textarea>
        <input type="submit">
    </form>
