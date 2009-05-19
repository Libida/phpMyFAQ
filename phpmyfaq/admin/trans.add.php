<?php
/**
 * Read in files for the translation and show them inside a form.
 * 
 * @package    phpMyFAQ
 * @subpackage Administration
 * @author     Anatoliy Belsky <ab@php.net>
 * @since      2009-05-11
 * @copyright  2003-2009 phpMyFAQ Team
 * @version    SVN: $Id$
 *
 * The contents of this file are subject to the Mozilla Public License
 * Version 1.1 (the "License"); you may not use this file except in
 * compliance with the License. You may obtain a copy of the License at
 * http://www.mozilla.org/MPL/
 *
 * Software distributed under the License is distributed on an "AS IS"
 * basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See the
 * License for the specific language governing rights and limitations
 * under the License.
 */
if (!defined('IS_VALID_PHPMYFAQ_ADMIN')) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']));
    exit();
}

if(!$permission["addtranslation"]) {
    print $PMF_LANG['err_NotAuth'];
    return;
}
?>
<form>
<table cellspacing="7">
<tr><td>Language code</td><td><input name="langcode" /></td></tr>
<tr><td>Language name</td><td><input name="langname" /></td></tr>
<tr><td>Language charset</td><td><input name="langcharset" /></td></tr>
<tr class="author_1_container"><td>Author</td><td><input name="author[]" /></td></tr>
<tr><td colspan="2"><a href="javascript: addAuthorContainer();">Add author</a></td></tr>
<tr><td colspan="2"><input type="button" value="Create Translation" onclick="save()" /></td></tr>
</table>
</form>
<script>
var max_author = 1

/**
 * Add an author input field to the form 
 * @return void
 */
function addAuthorContainer()
{
    var next_max_author = max_author + 1;
    var next_author_html = '<tr class="author_' + next_max_author + '_container">' +
                            '<td>Author</td><td><input name="author[]" />' +
                            '<a href="javascript: $(\'.author_' + next_max_author + '_container\').fadeOut(\'slow\');void(0);" >' +
                            'Remove</a></td></tr>';
    $('.author_' + max_author + '_container').after(next_author_html);
    max_author++
}

/**
 * Send the form data to the server to save
 * a new translation and redirect to the edit form
 * @return void
 */
function save()
{
    
}
</script>