<?php

namespace QBNK\QBank\API\Controller;

use QBNK\QBank\API\Model\DeploymentFile;
use QBNK\QBank\API\Model\DeploymentSite;
use QBNK\QBank\API\Model\Folder;
use QBNK\QBank\API\Model\Media;
use QBNK\QBank\API\Model\MediaResponse;
use QBNK\QBank\API\Model\Moodboard;

class MediaController extends ControllerAbstract
{
    /**
     * Fetches a specific Media.
     *
     * @param int $id The Media identifier.
     *
     * @return MediaResponse
     */
    public function retrieveMedia($id)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/'.$id.'', $parameters);
        $result = new MediaResponse($result);

        return $result;
    }
    /**
     * Gets the raw file data of a Media.
     *
     * You may append an optional template parameter to the query. Omitting the template parameter will return the medium thumbnail.
     *
     *  Existing templates are:
     *  <b>original</b> - The original file
     *  <b>preview</b> - A preview image, sized 1000px on the long side
     *  <b>thumb_small</b> - A thumbnail image, sized 100px on the long side
     *  <b>thumb_medium</b> - A thumbnail image, sized 200px on the long side
     *  <b>thumb_large</b> - A thumbnail image, sized 300px on the long side
     *  <b>videopreview</b> - A preview video, sized 360p and maximum 2min
     *  <b>{integer}</b> - An image template identifier
     *
     * @param int $id The Media identifier..
     * @param mixed $template Optional template of Media..
     */
    public function retrieveFileData($id, $template = null)
    {
        $parameters = [
            'query'   => ['template' => $template],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/'.$id.'/asset', $parameters);

        return $result;
    }
    /**
     * Fetches all DeployedFiles a media has.
     *
     * @param int $id The Media identifier..
     *
     * @return DeploymentFile[]
     */
    public function listDeployedFiles($id)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/'.$id.'/deployment/files', $parameters);
        foreach ($result as &$entry) {
            $entry = new DeploymentFile($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }
    /**
     * Fetches all DeploymentSites a Media is deployed to.
     *
     * @param int $id The Media identifier..
     *
     * @return DeploymentSite[]
     */
    public function listDeploymentSites($id)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/'.$id.'/deployment/sites', $parameters);
        foreach ($result as &$entry) {
            $entry = new DeploymentSite($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }
    /**
     * Downloads a specific Media.
     *
     * You may append an optional template parameter to the query. Omitting the template parameter will return the original file.
     *
     * @param int $id The Media identifier.
     * @param string $template Optional template to download the media in.
     */
    public function download($id, $template = null)
    {
        $parameters = [
            'query'   => ['template' => $template],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/'.$id.'/download', $parameters);

        return $result;
    }
    /**
     * Fetches all Folders a Media resides in.
     *
     * @param int $id The Media identifier..
     * @param int $depth The depth for which to include existing subfolders. Use zero to exclude them all toghether..
     *
     * @return Folder[]
     */
    public function listFolders($id, $depth = 0)
    {
        $parameters = [
            'query'   => ['depth' => $depth],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/'.$id.'/folders', $parameters);
        foreach ($result as &$entry) {
            $entry = new Folder($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }
    /**
     * Fetches all Moodboards a Media is a member of.
     *
     * @param int $id The Media identifier..
     *
     * @return Moodboard[]
     */
    public function listMoodboards($id)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/'.$id.'/moodboards', $parameters);
        foreach ($result as &$entry) {
            $entry = new Moodboard($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }
    /**
     * Downloads an archive of several Media.
     *
     * . You may append an optional template parameter to the query. Omitting the template parameter will return the original files.
     *
     * @param int[] $ids Array of Media ID:s to download.
     * @param string $template Optional template to download all Media in..
     */
    public function downloadArchive(array $ids, $template = null)
    {
        $parameters = [
            'query'   => ['ids' => $ids, 'template' => $template],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/download', $parameters);

        return $result;
    }
    /**
     * Upload a new media to QBank.
     *
     * This upload endpoint have been specially tailored to fit plupload2 chunked uploading. Max chunk size is about 10mb, if your files is larger then this, split it up and set correct chunk and chunks argument in the call.
     *  For example a 26mb file might be split in 3 chunks, so the following 3 calls should be made
     *  POST /media.json?chunks=3&chunk=0&filename=largefile.txt&categoryId=1 (file data is sent in body)
     *  POST /media.json?chunks=3&chunk=1&filename=largefile.txt&categoryId=1&fileId=<fileId from first call> (file data is sent in body)
     *  POST /media.json?chunks=3&chunk=2&filename=largefile.txt&categoryId=1&fileId=<fileId from first call> (file data is sent in body)
     *
     * @param string $name Filename of the file being uploaded
     * @param int $chunk The chunk we are currently uploading, starts at 0
     * @param int $chunks Number of chunks you will be uploading, when (chunk - 1) == chunks the file will be considered uploaded
     * @param string $fileId A unique fileId that will be used for this upload, if none is given one will be given to you
     * @param int $categoryId The category to place the file in
     *
     * @return array
     */
    public function uploadFileChunked($name, $chunk, $chunks, $fileId, $categoryId)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode(['name' => $name, 'chunk' => $chunk, 'chunks' => $chunks, 'fileId' => $fileId, 'categoryId' => $categoryId]),
            'headers' => [],
        ];
        $result = $this->post('v1/media', $parameters);

        return $result;
    }
    /**
     * Update a specific Media.
     *
     * Note that type_id cannot be set directly, but must be decided by the category. The properties parameter of the media
     *
     * @param int $id The Media identifier.
     * @param Media $media A JSON encoded Media representing the updates
     *
     * @return MediaResponse
     */
    public function updateMedia($id, Media $media)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode(['media' => $media]),
            'headers' => [],
        ];
        $result = $this->post('v1/media/'.$id.'', $parameters);
        $result = new MediaResponse($result);

        return $result;
    }
    /**
     * Restore a deleted Media.
     *
     * Can not restore a Media that has been hard deleted!
     *
     * @param int $id The Media identifier.
     *
     * @return MediaResponse
     */
    public function restoreMedia($id)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->post('v1/media/'.$id.'/restore', $parameters);
        $result = new MediaResponse($result);

        return $result;
    }
    /**
     * Delete a Media.
     *
     * Deleting a Media will set it's status to removed but will retain all data and enable restoration of the Media, much like the trash bin of your operating system. To permanetly remove a Media, use the "hardDelete" flag.
     *
     * @param int $id The Media identifier.
     * @param bool $hardDelete Prevent restoration of the Media..
     *
     * @return MediaResponse
     */
    public function removeMedia($id, $hardDelete = false)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->delete('v1/media/'.$id.'', $parameters);
        $result = new MediaResponse($result);

        return $result;
    }
}
