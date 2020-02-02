<?php /** @var \App\Data\UserDTO[] $data */ ?>

<table border="1">
    <thead>
    <tr>
        <td>Name</td>
        <td>Middlename</td>
        <td>Fullname</td>
        <td>PIN</td>
    </tr>
    </thead>

    <tbody>
        <?php foreach($data as $userDTO): ?>
            <tr>
                <td><?= $userDTO->getFirstName(); ?></td>
                <td><?= $userDTO->getMiddleName(); ?></td>
                <td><?= $userDTO->getLastName(); ?></td>
                <td><?= $userDTO->getPin(); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
