<?php 
    include_once '_partials/header.php';

    // create *storage* if no exits
    $file = '_inc/storage';
    mk_file( $file );

    $data = file_get_contents( $file );
    $data = json_decode( $data ) ?: [];

    
    $time = time();

    // add new thing, if form was submitted
    if ( can_edit() && ! empty( $_POST ) ){

        foreach ( $_POST['message'] as $message ){

            if ( ! $message = trim( $message ) ) continue;

            array_push( $data, (object)[
                'text' => $message,
                'time' => $time
            ]);   

        };

        file_put_contents( $file, json_encode( $data ) );

        header('Location: http://localhost/Diary/');
        die();

    }

    if ( can_edit() ){
        include_once '_partials/add-form.php';
    }

    ?>

    <aside>
        <ul class="coments">
            <?php foreach( $data as $i => $item ) : $row = ++$i ?>
                <li class="<?= get_parity( $row ) ?>">
                    <time datetime="<?= date('Y-m-d', $item -> time) ?>">
                        <?= date('j. n. Y', $item -> time) ?>
                    </time>
                    <p> <?= nl2br( plain( $item -> text ) ) ?></p>
                </li>
            <?php endforeach ?>
        </ul>
    </aside>

<?php include_once '_partials/footer.php' ?>

