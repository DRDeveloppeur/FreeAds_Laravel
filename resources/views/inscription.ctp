<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Inscription') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('name');
            echo $this->Form->control('lastname');
            echo $this->Form->control('birthdate', [
              'label' => 'Birthdate',
              'minYear' => date('Y') -100,
              'maxYear' => date('Y') -18]);
            echo $this->Form->control('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('S\'inscrire')) ?>
    <?= $this->Form->end() ?>
</div>
