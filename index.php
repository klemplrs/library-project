<?php

/* ––––– CONNECTION TO MYSQL BDD ––––– */

$host = 'localhost';
$dbname = 'mylibrary';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // echo "Successfully connected to $dbname on $host.";

} catch (PDOException $e) {
    
    die("Unable to connect to database $dbname :" . $e->getMessage());

} ?>

<!DOCTYPE html>

<html lang="EN">

    <head>
        <title>My Library</title>

        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <link rel="icon" href="/images/books.ico"/>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"/>
        <link rel="stylesheet" href="/css/styles.css"/>

        <script src="index.js"></script>

    </head>

    <body>

        <header>
            <div class="frame">
                <img src="/images/Image.jpg" alt="Logo" width="6.75%"/>

                <h1>My Virtual Library</h1>

                <a href="">Help ?</a>
            </div>

            <div class="bg-image header-bg-image">
                <h2>Here, find a way to escape your life, and dive into a whole new universe</h2>
            </div>
        </header>

        <main>

            <section>

                <div>
                    <div class="upperPart">
                        <h2>Book List</h2>

                        <button id="btnModal" class="btnModal">Add a New Book</button>
                    </div> 

                    <div id="modal_content" class="modal_content">

                        <div id="modal" class="modal">
                            <div>
                                <h3 class="modalTitle">New Book</h3>

                                <span id="btnClose">&times;</span>
                            </div>

                            <form action="index.php" method="POST">
                                <label for="title">Title: </label>
                                <input type="text" id="title" name="title" placeholder="The Three-Body Problem" required/>

                                <label for="author">Author: </label>
                                <select id="author" name="author_id" required>

                                    <option value="" selected>-- Choose your Author: --</option> 

                                    <!-- manual entries -->
                                    <!-- <option value="Chinua Achebe">Chinua Achebe</option> 
                                    <option value="Jane Austen">Jane Austen</option> 
                                    <option value="Honoré de Balzac">Honoré de Balzac</option> 
                                    <option value="Samuel Beckett">Samuel Beckett</option> 
                                    <option value="Emily Brontë">Emily Brontë</option> 
                                    <option value="Miguel de Cerventes">Miguel de Cerventes</option> 
                                    <option value="Charles Dickens">Charles Dickens</option> 
                                    <option value="Fiodor Dostoïevski">Fiodor Dostoïevski</option> 
                                    <option value="William Faulkner">William Faulkner</option> 
                                    <option value="Gabriel García Márquez">Gabriel García Márquez</option>  -->

                                    <!-- SELECT id, name FROM author ORDER BY name ASC -->
                                    <?php 
                                    $objetPDO = new PDO("mysql:host=localhost;dbname=mylibrary","root","");
                                    $sql = $objetPDO->query('SELECT author_id, name FROM author ORDER BY name ASC');
                                                    
                                    while ($data = $sql->fetch())
                                        {
                                    ?>     
                                    
                                    <option value= "<?php echo $data['author_id']?>"><?php echo $data['name']?></option> 
                                        
                                    <?php
                                        } 
                                    ?>
                                    
                                </select>

                                <label for="price">Price: </label>
                                <input type="number" id="price" name="price" min="0" step=".01" placeholder="23.00"/>

                                <label for="publication_date"> Publication Date: </label>
                                <input type="number" id="publication_date" name="publication_date" maxlength="4" placeholder="2008"/>

                                <label for="pages_number">Pages: </label>
                                <input type="number" id="pages_number" name="pages_number" min="0" placeholder="432"/>

                                <button type="submit">Save</button>
                            </form>

                        </div>

                    </div>

                </div>

                <div>

                    <table>

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author's name</th>
                                <th>Country</th>
                                <th>Publication Date</th>
                                <th>Price</th>
                            </tr>

                            <?php
                            $objetPDO = new PDO("mysql:host=localhost;dbname=mylibrary","root","");

                            $sql = 'SELECT id, title, name, country, publication_date, price FROM book LEFT JOIN author ON book.author_id = author.author_id';
                            
                            foreach ($objetPDO->query($sql) as $row) 
                                { 
                            ?>
                                <tr>
                                    <td><?= $row['id']?></td>
                                    <td><?= $row['title']?></td>
                                    <td><?= $row['name']?></td>
                                    <td><?= $row['country']?></td>
                                    <td><?= $row['publication_date']?></td>
                                    <td><?= $row['price']. " €"?></td>
                                    <td>
                                        <a href="remove.php?idd=<?= $row["id"]?>">Remove</a>
                                    </td>
                                </tr>

                            <?php
                                }
                            ?>

                        </thead>

                    </table>

                </div>

            </section>

        </main>

        <footer>

            <div class="bg-image footer-bg-image">
                <h2>Come back to see us soon !</h2>
            </div>

        </footer>

    </body>

</html>


<?php

/* ––––– FORM // SUBMIT TO BDD ––––– */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['title']) || empty($_POST['author_id']) || empty($_POST['price']) || empty($_POST['publication_date']) || empty($_POST['pages_number'])) {
        // echo "Thank you to fill out all the fields";
    
    } else {
        $title = $_POST['title'];
        $author_id = $_POST['author_id'];
        $price = $_POST['price'];
        $publication_date = $_POST['publication_date'];
        $pages_number = $_POST['pages_number'];

        $objetPDO = new PDO("mysql:host=localhost;dbname=mylibrary","root","");

        $sql = $objetPDO->prepare("INSERT INTO book (title, author_id, price, publication_date, pages_number) VALUES (:title, :author_id, :price, :publication_date, :pages_number)");
        $sql->execute(array(':title' => $title, ':author_id' => $author_id, ':price' => $price, ':publication_date' => $publication_date, ':pages_number' => $pages_number));
    }
}
