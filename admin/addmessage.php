<?php   
    include '../header.php';
    checkAdmin();
    if (isset($_POST['postback']))
    {
        $errors = array();
        
        $title = $_POST['title'];
        $message = $_POST['message'];

        if (empty ($title))
        {
            array_push($errors, "Er is geen titel ingevuld");
        }
        if (empty($message))
        {
            array_push($errors, "Er is geen bericht ingevuld");
        }
        
        if (count($errors) == 0)
        {
            $query = sprintf("INSERT INTO messages (title, message) VALUES ('%s', '%s')", mysql_real_escape_string($title), mysql_real_escape_string($message));

            mysql_query($query);
            //echo $query;
            header("Location:messages.php");
        }
    }
?>			
<div id="content">
    <h2>Bericht toevoegen</h2>
    <?php
        if (!empty($errors))
        {
            echo "<div class=\"error\"><ul>";

            foreach ($errors as $error)
            {
                    echo "<li>" . $error . "</li>";
            }

            echo "</ul></div>";
        }
    ?>

    <form method="post">
        <div class="input-container">
            <label for="title"><i class="fa fa-user fa-lg fa-fw"></i>Titel</label>
            <input type="text" name="title" id="title" value="<?php if (isset($_POST['title'])) echo $_POST['title'] ?>" required="required"/>
        </div>

        <div class="input-container">
            <label for="message"><i class="fa fa-briefcase fa-lg fa-fw"></i>Bericht</label>
            <textarea required="required" name="message"><?php if (isset($_POST['message'])) echo $_POST['message'] ?></textarea>
        </div>

        <div class="input-container">
                <input type="submit" class="float-right" name="postback" value="Opslaan &rarr;" />
                <a href="messages.php" class="button float-right">&larr; Terug</a>
        </div>
    </form>
</div>
<?php
    include '../footer.php';
?>