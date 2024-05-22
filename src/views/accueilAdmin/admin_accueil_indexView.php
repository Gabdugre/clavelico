<?php get_header('Admin accueil', 'admin'); ?>
accueil
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Presentation</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($presentation as $presentations) { ?>
            <tr>
            <!-- <?php var_dump($presentations); ?> -->
                <td class="align-middle"><?= $presentations->presentation_paragraphe; ?></td>
                <td class="align-middle"><?= $presentations->presentation_image; ?></td>
                <td class="text-center align-middle">
                    <a class='btn btn-warning' href="<?= $router->generate('editAccueil', ['id' =>  $presentations->id]); ?>">Editer</a>
                    <!-- <a class='btn btn-danger'href="<?= $router->generate('deleteMovie', ['id' =>  $movie->id]); ?>">Supprimer</a> -->
                </td>
            </tr>
            <?php var_dump($data); ?>
        <?php } ?>
    </tbody>
</table>

<?php get_footer('admin'); ?>

