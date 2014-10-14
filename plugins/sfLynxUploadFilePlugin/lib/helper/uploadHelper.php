<?php
/*
 * This file is part of the LynxCms .
 * (c) 2009-2010 Henry Vallenilla <hvallenilla@aberic.com> <henryvallenilla@gmail.com>
 */

/**
 * uploadFileHelper. represents a resized uploaded file.
 *
 * @package    symfony
 * @subpackage helper
 * @author     Henry Vallenilla <hvallenilla@aberic.com> <henryvallenilla@gmail.com>
 * @author     David Quiñones  <dqblanco@aberic.com>
 * @version    SVN: $Id: uploadFileHelper.php 1.0
 */

/**
 * Saves to uploaded file
 *
 * This method can throw exceptions if there is a problem when saving the file.
 *
 * If you don't pass a file name, it will be generated by the generateFilename method.
 * This will only work if you have passed a path when initializing this instance.
 *
 * @param <string> $fileOriginal       The original file name
 * @param <string> $tempFileName       The absolute temporary path to the file
 * @param <int> $delete
 * @param <string> $dirUploadFile      The path to save the file (optional).
 * @param <int> $idReference           Indicates the unique id to concatenate the file name
 * @param <int> $inModule           Indicates the  file of configuration the upload images
 * @param <bool> $create
 * @param <int> $dirMode
 * @return <string> The filename
 *
 * @throws Exception
 */
function loadFile($fileOriginal, $tempFileName , $delete, $dirUploadFile, $idReference = 0, $create = true, $dirMode = 0777)
{
    // Instancio LyxnValida
    $lxValida = new lynxValida();
    $fileName = $fileOriginal;
    $fileName = $lxValida->preparaArchivo($fileName,20);    
    $fileName = $idReference."_".$fileName;    
    // Check if have the permissions
    if (!is_readable($dirUploadFile))
    {
        if ($create && !mkdir($dirUploadFile, $dirMode, true))
        {
            // failed to create the directory
            throw new Exception(sprintf('Failed to create file upload directory "%s".', $dirUploadFile));
        }
        // chmod the directory since it doesn't seem to work on recursive paths
        chmod($dirUploadFile, $dirMode);
    }
    // Check if directory exist
    if (!is_dir($dirUploadFile))
    {
        // the directory path exists but it's not a directory
        throw new Exception(sprintf('File upload path "%s" exists, but is not a directory.', $dirUploadFile));
    }
    // Check if the directory isn't writable
    if (!is_writable($dirUploadFile))
    {
        // the directory isn't writable
        throw new Exception(sprintf('File upload path "%s" is not writable.', $dirUploadFile));
    }
    
    // Dinamic FilePath
    $filepath = $dirUploadFile.$fileName;
    move_uploaded_file($tempFileName, $filepath);
    // chmod our file
    chmod($filepath, 0777);
    
    // Return the name of the file that was built
    return $fileName;
}

