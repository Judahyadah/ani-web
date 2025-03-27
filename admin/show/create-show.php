<?php require '../layout/header.php'; ?>
<?php require '../../config/config.php'; ?>
<?php
$genre = $conn->query("SELECT * FROM genre");
$genre->execute();
$allGenre = $genre->fetchAll(PDO::FETCH_OBJ);

if(!isset($_SESSION['adminname'])){
    echo ("<script>setInterval(window.location.assign('".ADMINURL."/admin/login-admin.php'), 5000);</script>");
}
if(isset($_POST['createShow'])){
    
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $type = trim($_POST['type']);
        $studios = trim($_POST['studios']);
        $date_aired = trim($_POST['date_aired']);
        $status = trim($_POST['status']);
        $genre = trim($_POST['genre']);
        $duration = trim($_POST['duration']);
        $quality = trim($_POST['quality']);
        $num_available = trim($_POST['num_available']);
        $num_total = trim($_POST['num_total']);
        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['image']['name'];
        } else {
            $errs[] = "Image upload required";
            $image = null; // Or handle error appropriately
        }

        if(empty("$title")){ $errs[] = $titleError = "value expected"; }
        if(empty("$description")){ $errs[] = $descriptionError = "value expected"; }
        if(empty("$type")){ $errs[] = $typeError = "value expected"; }
        if(empty("$studios")){ $errs[] = $studiosError = "value expected"; }
        if(empty("$date_aired")){ $errs[] = $dateAiredError = "value expected"; }
        if(empty("$status")){ $errs[] = $statusError = "value expected"; }
        if(empty("$genre")){ $errs[] = $genreError = "value expected"; }
        if(empty("$duration")){ $errs[] = $durationError = "value expected"; }
        if(empty("$quality")){ $errs[] = $qualityError = "value expected"; }
        if(empty("$num_available")){ $errs[] = $numAvailableError = "value expected"; }
        if(empty("$num_total")){ $errs[] = $numTotalError = "value expected"; }
        if(count($errs) == 0){

        $dir ="img/".basename($image);

        $insert = $conn->prepare("INSERT INTO administrators(title, description, type, studios, date_aired, status, genre, duration, quality, num_available, num_total, image ) VALUES(:title, :description, :type, :studios, :date_aired, :status, :genre, :duration, :quality, :num_available, :num_total, :image)");
        
        $insert->execute([
            ":title" =>$title,
            ":description" =>$description,
            ":type" =>$type,
            ":studios" =>$studios,
            ":date_aired" =>$date_aired,
            ":status" =>$status,
            ":genre" =>$genre,
            ":duration" =>$duration,
            ":quality" =>$quality,
            ":num_available" =>$num_available,
            ":num_total" =>$num_total,
            ":image" =>$image,
        ]);
        if(move_upload_file($_FILES['image']['tmp_name'], $dir)){
            $success = "$title added";
            header("Refresh: 5; url= shows.php");
        }

    }
}
?>
<div class="container-fluid content-space-2 content-space-lg-3">
    <?php require '../layout/alert.php' ?>
    <div class="row">
        <?php require '../layout/sidebar.php'; ?>
        <div class="col-lg-9 mb-3">
            <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="shows.php">Show</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Show</li>
                </ol>
            </nav>

            <div class="card border-0 shadow-md">
                <!-- Form -->
                <div class="content-space-2 ">
                    <div class="flex-grow-1 mx-auto" style="max-width: 28rem;">

                        <!-- Form -->
                        <form class="js-validate needs-validation" novalidate method="post" action="create-show.php">
                            <div class="row">
                                <!-- Form -->
                                <div class="col mb-3">
                                    <label class="form-label" for="simpleTitle">Title</label>
                                    <input required type="text" class="form-control form-control-lg" name="title"
                                        id="simpleTitle" placeholder="eg. One Piece" aria-label="eg. One Piece"
                                        required>
                                    <span class="invalid-feedback"><?= $titleError;?></span>
                                </div>
                                <!-- End Form -->

                                <!-- Form -->
                                <div class="col mb-3">
                                    <label class="form-label" for="studio">Studio</label>
                                    <input required type="text" class="form-control form-control-lg" name="studios"
                                        id="studio" aria-label="studio" required>
                                    <span class="invalid-feedback"><?= $studiosError;?></span>
                                </div>
                                <!-- End Form -->
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input required type="file" name="image" id="image" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlDescription">Description</label>
                                <textarea name="description" id="exampleFormControlDescription1" class="form-control"
                                    placeholder="Description field" rows="4" required></textarea>

                                <span class="invalid-feedback"><?= $descriptionError;?></span>
                            </div>
                            <!-- End Form -->

                            <div class="row">
                                <div class="col mb-3">
                                    <label class="form-label" for="">Type </label>
                                    <input required type="text" name="type" id="type"
                                        class="form-control form-control-lg" placeholder="eg. Tv series">
                                    </select>
                                    <span class="invalid-feedback"><?= $typeError;?></span>
                                </div>

                                <!-- Form -->
                                <div class="col mb-3">
                                    <label class="form-label" for="exampleFormControlSelect1">Genre</label>
                                    <select name="genre" id="exampleFormControlSelect1" class="form-control" required>
                                        <option>Choose an option</option>
                                        <?php foreach($allGenre as $genre) : ?>
                                        <option value="<?= $genre->name; ?>"><?= $genre->name; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <span class="invalid-feedback"><?= $genreError;?></span>
                                </div>
                                <!-- End Form -->
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    <label class="form-label" for="simpleDateAired">Date Aired</label>
                                    <input required name="date_aired" type="date" class="form-control form-control-lg"
                                        name="date_aired" id="simpleDateAired" placeholder="yyyy-mm-dd"
                                        aria-label="date-aired" required>
                                    <span class="invalid-feedback"><?= $dateAiredError;?></span>
                                </div>

                                <!-- Form -->
                                <div class="col mb-3">
                                    <label class="form-label" for="simpleDuration">Duration</label>
                                    <input required type="time" class="form-control form-control-lg" name="duration"
                                        id="simpleDuration" placeholder="yyyy-mm-dd" aria-label="duration" required>
                                    <span class="invalid-feedback"><?= $durationError;?></span>
                                </div>
                                <!-- End Form -->
                            </div>

                            <div class="row">

                                <div class="col mb-3">
                                    <label class="form-label" for="simpleStatus">status</label>
                                    <input required name="status" type="text" class="form-control form-control-lg"
                                        name="status" id="simpleDateAired" placeholder="On Hold" aria-label="status"
                                        required>
                                    <span class="invalid-feedback"><?= $statusError;?></span>
                                </div>
                                <!-- Form -->
                                <div class="col mb-3">
                                    <label class="form-label" for="simpleQuality">Quality</label>
                                    <input required type="text" class="form-control form-control-lg" name="quality"
                                        id="simpleQuality" placeholder="quality" aria-label="quality" required>
                                    <span class="invalid-feedback"><?= $qualityError;?></span>
                                </div>
                                <!-- End Form -->
                            </div>

                            <div class="row">
                                <!-- Form -->
                                <div class="col mb-3">
                                    <label class="form-label" for="simpleNumAvailable">Num Available</label>
                                    <input required type="number" class="form-control form-control-lg"
                                        name="num_available" id="simpleNumAvailable" placeholder="num-available"
                                        aria-label="num-available" required>
                                    <span class="invalid-feedback"><?= $numAvailableError;?></span>
                                </div>
                                <!-- End Form -->

                                <!-- Form -->
                                <div class="col mb-3">
                                    <label class="form-label" for="simpleNum Total">Num Total</label>
                                    <input required type="text" class="form-control form-control-lg" name="num_total"
                                        id="simpleNumTotal" placeholder="num-total" aria-label="num-total" required>
                                    <span class="invalid-feedback"><?= $numTotalError;?></span>
                                </div>
                                <!-- End Form -->
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" name="createShow" class="btn btn-primary btn-lg">Create</button>
                            </div>

                        </form>
                        <!-- End Form -->
                    </div>
                </div>
                <!-- End Form -->
            </div>

        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>
</body>

<?php require '../layout/footer.php'; ?>