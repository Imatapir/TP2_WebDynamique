<h1>Forum Create</h1>
        <form action="?controller=forum&function=store" method="post">
            <label for="forum_title">Title</label>
            <input type="text" id="forum_title" name="forum_title" >
            <label for="forum_article">Article</label>
            <textarea id="forum_article" name="forum_article"></textarea>
            <input type="submit" value="Save">
        </form>