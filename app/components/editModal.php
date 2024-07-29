<?php
function editModal()
{
    return '
    <div id="edit-modal" class="modal update-modal">
        <button class="close-edit-modal">x</button>

        <form action="' . BASE_URL . '/note/edit" method="POST">
            <div>
                <input type="text" name="title" placeholder="Title" value="">
            </div>

            <div>
                <textarea rows="4" name="content" placeholder="Content"></textarea>
            </div>

            <input type="hidden" name="id" value="">

            <button type="submit">UPDATE NOTE</button>
        </form>
    </div>
    ';
}
