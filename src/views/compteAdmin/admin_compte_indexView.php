<?php get_header('Admin compte', 'admin'); ?>
compte
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Presentation</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($compte as $account) { ?>
            <tr>
            <!-- <?php var_dump($account); ?> -->
                <td class="align-middle"><?= $account -> mail; ?></td>
                <td class="text-center align-middle">
                    <a class='btn btn-warning' href="<?= $router->generate('edit_compte_admin', ['id' =>  $account->id]); ?>">Editer</a>
                    <!-- <a class='btn btn-danger'href="<?= $router->generate('deleteMovie', ['id' =>  $movie->id]); ?>">Supprimer</a> -->
                </td>
            </tr>
            <?php var_dump($data); ?>
        <?php } ?>
    </tbody>
</table>

<?php get_footer('admin'); ?>