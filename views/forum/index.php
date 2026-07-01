
<h1>Forums</h1>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th>Show</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $row)
                {
                ?>
                <tr>
                    <td><?= $row['forum_title']; ?></td>
                    <td><?= $row['forum_date']; ?></td>
                    <td><?= $row['user_pseudonyme']; ?></td>
                    <td><a href="?controller=forum&function=show&id=<?=  $row['forum_id']; ?>" class="btn">Show</a></td>
                </tr>    
                <?php
                }
                ?>
            </tbody>
        </table>
