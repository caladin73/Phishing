<?php
function makeNote($noteStore, $noteTitle, $noteBody, $resources = array(), $parentNotebook = null) {
    // Create a Note instance with title and body
    // Send Note object to user's account
    $ourNote = new Note();
    $ourNote->title = $noteTitle;
    ## Build body of note
    $nBody = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
    $nBody .= "<!DOCTYPE en-note SYSTEM \"http://xml.evernote.com/pub/enml2.dtd\">";
    $nBody .= "<en-note>" . $noteBody;
    if (isset($resources) && !empty($resources)) {
        // Add Resource objects to note body
        $nBody .= "<br /><br />";
        $ourNote->resources = $resources;
        foreach ($resources as $resource) {
            $hexhash = md5($resource->data->body, 0);
            $nBody .= "Attachment with hash " . $hexhash . ": <br /><en-media type=\"" . $resource->mime . "\" hash=\"" . $hexhash . "\" /><br />";
        }
    }
    $nBody .= "</en-note>";

    $ourNote->content = $nBody;
    // parentNotebook is optional; if omitted, default notebook is used
    if (isset($parentNotebook) && isset($parentNotebook->guid)) {
        $ourNote->notebookGuid = $parentNotebook->guid;
    }

    // Attempt to create note in Evernote account
    $note = null;
    try {
        $note = $noteStore->createNote($ourNote);
    } catch (EDAMUserException $edue) {
        // Something was wrong with the note data
        // See EDAMErrorCode enumeration for error code explanation
        // http://dev.evernote.com/documentation/reference/Errors.html#Enum_EDAMErrorCode
        print "EDAMUserException: " . $edue;
    } catch (EDAMNotFoundException $ednfe) {
        // Parent Notebook GUID doesn't correspond to an actual notebook
        print "EDAMNotFoundException: Invalid parent notebook GUID";
    }

    // Return created note object
    return $note;

}