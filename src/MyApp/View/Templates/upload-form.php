<div id="wrapper">
    <div class="container" style="padding-left: 0px; margin-left: unset">
        <div class="content">
            <h1>Upload</h1>

            <form action="" method="post" enctype="multipart/form-data">
                <label for="image_title">Image Title</label><br />
                <input id="image_title" type="text" value="Car cu boi" name="imageTitle" / required>
                <br />

                <label for="camera_specs">Camera Specs</label><br />
                <input id="camera_specs" type="text" value="Pictura pe panza" name="cameraSpecs" / required>
                <br />

                <label for="price">Price(EURO)</label><br />
                <input id="price" type="text" value="10000" name="price" / required>
                <br />

                <label for="capture_date">Capture Date</label><br />
                <input id="capture_date" type="date"value="2013-01-08" name="captureDate" / required>
                <br />

                <label for="tag">Tag</label><br />
                <select name='tag[]' multiple="" required>
                    <option value="nature">Nature</option>
                    <option value="animals">Animals</option>
                    <option value="Cities">City</option>
                    <option value="Cars">Cars</option>
                </select>
                <br />

                <input type="file" name="image1" />
                <br />
                <br />
                <input type="submit" value="Salveaza profil" name="submit"/>
            </form>
        </div>
    </div>
</div>