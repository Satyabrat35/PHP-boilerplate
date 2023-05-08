<div class="container">
    <h1>Songs</h1>
    <h3>You are in the Song view</h3>
    <!-- add song form -->
    <div class="box">
        <h3>Add a song</h3>
        <form name="add_song" action="" method="POST" id="add_song">
            <label>Artist</label>
            <input type="text" name="artist" id="artist" value="" required />
            <label>Track</label>
            <input type="text" name="track" id="track" value="" required />
            <label>Link</label>
            <input type="text" name="link" id="link" value="" />
            <input type="submit" name="submit_add_song" value="Submit" />
        </form>
    </div>
    <!-- main content output -->
    <div class="box">
        <h3>Total songs: <?php echo $total_songs; ?></h3>
        <h3>Total songs (via AJAX)</h3>
        <div id="javascript-ajax-result-box"></div>
        <div>
            <button id="javascript-ajax-button">Click here to get the total num of songs </button>
        </div>
        <h3>List of songs</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
<!--                <td>Id</td>-->
                <td>Artist</td>
                <td>Track</td>
                <td>Link</td>
                <td>Remove</td>
<!--                <td>EDIT</td>-->
            </tr>
            </thead>
            <tbody>
            <?php foreach ($all_songs as $song) { ?>
                <tr>
<!--                    <td id="id">--><?php //if (isset($song->id)) echo htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?><!--</td>-->
                    <td><?php if (isset($song->artist)) echo htmlspecialchars($song->artist, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($song->track)) echo htmlspecialchars($song->track, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <?php if (isset($song->link)) { ?>
                            <a href="<?php echo htmlspecialchars($song->link, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($song->link, ENT_QUOTES, 'UTF-8'); ?></a>
                        <?php } ?>
                    </td>
                    <td><button class="delbtn" value="<?php echo $song->id; ?>">Delete</button></td>
<!--                    <td><a href="--><?php //echo URL . 'songs/editsong/' . htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?><!--">edit</a></td>-->
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="box">
        <h3>Try ChatGPT</h3>
        <form name="chat_gpt" action="" method="POST" id="chat_gpt">
            <input type="text" name="search" id="search" value="" placeholder="search" required />
            <input type="submit" name="submit_chat_gpt" value="Submit" />
        </form>
        <div id="chat-gpt-result-box"></div>
    </div>
</div>
