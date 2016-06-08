<?php

namespace QBNK\QBank\API\Controller;

use GuzzleHttp\Post\PostFile;
    use QBNK\QBank\API\CachePolicy;
    use QBNK\QBank\API\Exception\UploadException;
    use QBNK\QBank\API\Model\Comment;
    use QBNK\QBank\API\Model\CommentResponse;
    use QBNK\QBank\API\Model\DeploymentFile;
    use QBNK\QBank\API\Model\DeploymentSiteResponse;
    use QBNK\QBank\API\Model\FolderResponse;
    use QBNK\QBank\API\Model\Media;
    use QBNK\QBank\API\Model\MediaResponse;
    use QBNK\QBank\API\Model\MediaVersion;
    use QBNK\QBank\API\Model\MoodboardResponse;
    use QBNK\QBank\API\Model\Property;
    use QBNK\QBank\API\Model\SocialMedia;

    class MediaController extends ControllerAbstract
    {
        /**
     * Fetches a specific Media.
     * 
     * @param int $id The Media identifier.
     * @param CachePolicy $cachePolicy A custom cache policy used for this request only.
     
     * @return MediaResponse
     */
    public function retrieveMedia($id, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/'.$id.'', $parameters, $cachePolicy);
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
     *  <b>{integer}</b> - An image template identifier (NOTE: You can only request templates that are available on the server, eg. a media that have been published using COPY or SYMLINK-protocols)
     * 
     * @param int $id The Media identifier..
     * @param mixed $template Optional template of Media..
     * @param CachePolicy $cachePolicy A custom cache policy used for this request only.
     
     * @return string The raw file data
     */
    public function retrieveFileData($id, $template = null, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query'   => ['template' => $template],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/'.$id.'/asset', $parameters, $cachePolicy);

        return $result;
    }
    /**
     * Fetches all DeployedFiles a Media has.
     * 
     * @param int $id The Media identifier..
     * @param CachePolicy $cachePolicy A custom cache policy used for this request only.
     
     * @return DeploymentFile[]
     */
    public function listDeployedFiles($id, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/'.$id.'/deployment/files', $parameters, $cachePolicy);
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
     * @param CachePolicy $cachePolicy A custom cache policy used for this request only.
     
     * @return DeploymentSiteResponse[]
     */
    public function listDeploymentSites($id, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/'.$id.'/deployment/sites', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new DeploymentSiteResponse($entry);
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
     * @param string $template Optional template to download the media in (NOTE: This should not be used for fetching images often, use very sparingly and consider using publish-sites and templates instead).
     * @param string $templateType Indicates type of template, valid values are; image, video.
     * @param CachePolicy $cachePolicy A custom cache policy used for this request only.
     
     * @return resource A file pointer resource pointing to a temporary file.
     */
    public function download($id, $template = null, $templateType = 'image', CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query'   => ['template' => $template, 'templateType' => $templateType],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/'.$id.'/download', $parameters, $cachePolicy);

        $tmpFile = tmpfile();
        if (fwrite($tmpFile, $result) === false) {
            throw new \RuntimeException('Could not write download data to temporary file!');
        }
        if (fseek($tmpFile, 0) === false) {
            throw new \RuntimeException('Could not reset file pointer of temporary file!');
        }
        $result = $tmpFile;

        return $result;
    }
    /**
     * Fetches all Folders a Media resides in.
     * 
     * @param int $id The Media identifier..
     * @param int $depth The depth for which to include existing subfolders. Use zero to exclude them all toghether..
     * @param CachePolicy $cachePolicy A custom cache policy used for this request only.
     
     * @return FolderResponse[]
     */
    public function listFolders($id, $depth = 0, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query'   => ['depth' => $depth],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/'.$id.'/folders', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new FolderResponse($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }
    /**
     * Fetches all Moodboards a Media is a member of.
     * 
     * @param int $id The Media identifier..
     * @param CachePolicy $cachePolicy A custom cache policy used for this request only.
     
     * @return MoodboardResponse[]
     */
    public function listMoodboards($id, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/'.$id.'/moodboards', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new MoodboardResponse($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }
    /**
     * Fetches all links to SocialMedia that a Media has.
     * 
     * Fetches all DeployedFiles a Media has.
     * 
     * @param int $id The Media identifier..
     * @param CachePolicy $cachePolicy A custom cache policy used for this request only.
     
     * @return DeploymentFile[]
     */
    public function listSocialMediaFiles($id, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/'.$id.'/socialmedia/files', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new DeploymentFile($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }
    /**
     * Fetches all SocialMedia sites a Media is published to.
     * 
     * @param int $id The Media identifier..
     * @param CachePolicy $cachePolicy A custom cache policy used for this request only.
     
     * @return SocialMedia[]
     */
    public function listSocialMedia($id, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/'.$id.'/socialmedia/sites', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new SocialMedia($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }
    /**
     * Fetches the version list of a media.
     * 
     * The id may be of any media version in the list; first, somewhere in between or last.
     * 
     * @param int $id The Media identifier..
     * @param CachePolicy $cachePolicy A custom cache policy used for this request only.
     
     * @return MediaVersion[]
     */
    public function listVersions($id, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/'.$id.'/versions', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new MediaVersion($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }
    /**
     * Fetches eventual comments made on this media.
     * 
     * @param int $mediaId The Media identifier..
     * @param CachePolicy $cachePolicy A custom cache policy used for this request only.
     
     * @return CommentResponse[]
     */
    public function listComments($mediaId, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/'.$mediaId.'/comments', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new CommentResponse($entry);
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
     * @param CachePolicy $cachePolicy A custom cache policy used for this request only.
     */
    public function downloadArchive(array $ids, $template = null, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query'   => ['ids' => $ids, 'template' => $template],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->get('v1/media/download', $parameters, $cachePolicy);

        return $result;
    }
    /**
     * Upload a new media to QBank.
     * 
     * This upload endpoint has been specifically tailored to fit chunked uploading (works well with Plupload2 for example). Max chunk size is about 10mb, if your files are larger than this, split it up and set correct chunk and chunks argument in the call.
     *  For example a 26mb file might be split in 3 chunks, so the following 3 calls should be made
     *  POST /media.json?chunks=3&chunk=0&filename=largefile.txt&categoryId=1 (file data is sent in body)
     *  POST /media.json?chunks=3&chunk=1&filename=largefile.txt&categoryId=1&fileId=<fileId from first call> (file data is sent in body)
     *  POST /media.json?chunks=3&chunk=2&filename=largefile.txt&categoryId=1&fileId=<fileId from first call> (file data is sent in body)
     *
     * @param mixed $fileData The file's data content.
     * @param string $name Filename of the file being uploaded
     * @param int $chunk The chunk we are currently uploading, starts at 0
     * @param int $chunks Number of chunks you will be uploading, when (chunk - 1) == chunks the file will be considered uploaded
     * @param string $fileId A unique fileId that will be used for this upload, if none is given one will be given to you
     * @param int $categoryId The category to place the file in
     
     * @return array
     */
    public function uploadFileChunked($fileData, $name, $chunk, $chunks, $fileId, $categoryId)
    {
        $parameters = [
            'query' => [
                'name'       => $name,
                'chunk'      => $chunk,
                'chunks'     => $chunks,
                'fileId'     => $fileId,
                'categoryId' => $categoryId,
            ],
            'body'    => ['file' => new PostFile('file', $fileData)],
            'headers' => ['Content-type' => 'multipart/form-data'],
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
     
     * @return MediaResponse
     */
    public function updateMedia($id, Media $media)
    {
        if ($media instanceof MediaResponse) {
            // Downcast to skip unnecessary params.
        $media = new Media(json_decode(json_encode($media), true));
        }

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
     * Groups one "main" Media with one or more "child" Media.
     * 
     * The main medium will by default be the only medium shown when searching, child media can be fetched by issuing a search with parentId set to the main medium id.
     * 
     * @param int $id The Media identifier.
     * @param int[] $children An array of int values.
     */
    public function group($id, array $children)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode(['children' => $children]),
            'headers' => [],
        ];
        $result = $this->post('v1/media/'.$id.'/group', $parameters);

        return $result;
    }
    /**
     * Restore a deleted Media.
     * 
     * Can not restore a Media that has been hard deleted!
     * 
     * @param int $id The Media identifier.
     
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
     * Change status of a Media.
     * 
     * This is used to move media from the uploaded tab into the library.
     *  Possible statuses are: <ul> <li>approved</li> </ul> 
     *
     * 
     * @param int $id The Media identifier.
     * @param string $status The new status of the media
     
     * @return array
     */
    public function setStatus($id, $status)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode(['status' => $status]),
            'headers' => [],
        ];
        $result = $this->post('v1/media/'.$id.'/status', $parameters);

        return $result;
    }
    /**
     * Upload a new version of a media.
     * 
     * This upload endpoint has been specifically tailored to fit chunked uploading (works well with Plupload2 for example). Max chunk size is about 10mb, if your files are larger than this, split it up and set correct chunk and chunks argument in the call.
     *  For example a 26mb file might be split in 3 chunks, so the following 3 calls should be made
     *  POST /media.json?chunks=3&chunk=0&filename=largefile.txt&categoryId=1 (file data is sent in body)
     *  POST /media.json?chunks=3&chunk=1&filename=largefile.txt&categoryId=1&fileId=<fileId from first call> (file data is sent in body)
     *  POST /media.json?chunks=3&chunk=2&filename=largefile.txt&categoryId=1&fileId=<fileId from first call> (file data is sent in body)
     *
     * 
     * @param int $id The Media identifier.
     * @param string $revisionComment The revision comment
     * @param string $name Filename of the file being uploaded
     * @param int $chunk The chunk we are currently uploading, starts at 0
     * @param int $chunks Number of chunks you will be uploading, when (chunk - 1) == chunks the file will be considered uploaded
     * @param string $fileId A unique fileId that will be used for this upload, if none is given one will be given to you
     
     * @return array
     */
    public function uploadNewVersionChunked($id, $revisionComment, $name, $chunk, $chunks, $fileId)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode(['revisionComment' => $revisionComment, 'name' => $name, 'chunk' => $chunk, 'chunks' => $chunks, 'fileId' => $fileId]),
            'headers' => [],
        ];
        $result = $this->post('v1/media/'.$id.'/version', $parameters);

        return $result;
    }
    /**
     * Post a comment on a media.
     * 
     * , leave username and useremail empty to post as the user that is logged on to the API.
     * 
     * @param int $mediaId the media to post the comment on.
     * @param Comment $comment The comment to post
     
     * @return CommentResponse
     */
    public function createComment($mediaId, Comment $comment)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode(['comment' => $comment]),
            'headers' => [],
        ];
        $result = $this->post('v1/media/'.$mediaId.'/comments', $parameters);
        $result = new CommentResponse($result);

        return $result;
    }
    /**
     * Update some properties for a Media.
     * 
     * Update the provided properties for the specified Media. Will not update any other properties then those provided. It is preferable to use this method over updating a whole media to change a few properties as the side effects are fewer.
     * 
     * @param int $id The Media identifier.
     * @param Property[] $properties An array of QBNK\QBank\Api\v1\Model\Property values.
     
     * @return array
     */
    public function updateProperties($id, array $properties)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode(['properties' => $properties]),
            'headers' => [],
        ];
        $result = $this->put('v1/media/'.$id.'/properties', $parameters);

        return $result;
    }
    /**
     * Delete a Media.
     * 
     * Deleting a Media will set it's status to removed but will retain all data and enable restoration of the Media, much like the trash bin of your operating system. To permanetly remove a Media, use the "hardDelete" flag.
     * 
     * @param int $id The Media identifier.
     * @param bool $hardDelete Prevent restoration of the Media..
     
     * @return MediaResponse
     */
    public function removeMedia($id, $hardDelete = false)
    {
        $parameters = [
            'query'   => ['hardDelete' => $hardDelete],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->delete('v1/media/'.$id.'', $parameters);
        $result = new MediaResponse($result);

        return $result;
    }
    /**
     * Delete a comment.
     * 
     * on a media
     * 
     * @param int $mediaId the media to delete the comment from.
     * @param int $commentId the comment to delete.
     
     * @return Comment
     */
    public function removeComment($mediaId, $commentId)
    {
        $parameters = [
            'query'   => [],
            'body'    => json_encode([]),
            'headers' => [],
        ];
        $result = $this->delete('v1/media/'.$mediaId.'/comments/'.$commentId.'', $parameters);
        $result = new Comment($result);

        return $result;
    }

    /**
     * Upload a new Media to QBank.
     *
     * Will automatically divide files into chunks if neccessary. The specific breakpoint when chunking occurs is
     * customizable, but defaults to the recommended maximum. It is also possible to monitor uploading via callbacks.
     *
     * @param string $pathname The pathname of the file to upload.
     * @param string $name The name of the new Media.
     * @param int $categoryId The ID of the Category the new Media should belong to.
     * @param callable $progress Provides progress monitoring. Callback should have the signature function($chunk, $chunkTotal).
     * @param int $chunkSize The size of chunk during upload. Defaults to the recommended maximum of 10MB.
     *
     * @throws UploadException Thrown if something went wrong during the upload.
     *
     * @return MediaResponse The newly created Media.
     */
    public function uploadFile($pathname, $name, $categoryId, $progress = null, $chunkSize = 10485760)
    {
        $chunk       = 0;
        $chunksTotal = ceil(filesize($pathname) / $chunkSize);
        $fileId      = sha1(uniqid('upload', true));
        $fp          = fopen($pathname, 'r');
        if ($fp === false) {
            throw new UploadException('Could not open file "'.$pathname.'" for reading.');
        }
        if ($chunkSize > 10485760) {
            $this->logger->warning('Using a chunk size larger then 10MB is not recommended. Uploading is not guaranteed to work properly.');
        }
        while ($chunkData = fread($fp, $chunkSize)) {
            $result = $this->uploadFileChunked($chunkData, $name, $chunk, $chunksTotal, $fileId, $categoryId);
            if (is_callable($progress)) {
                try {
                    call_user_func($progress, $chunk + 1, $chunksTotal);
                } catch (\Exception $e) {
                    $this->logger->warning('Could not report progress due to callback error.', ['message' => $e->getMessage()]);
                }
            }
            $this->logger->info('Upload progress!', ['part' => $chunk + 1, 'total' => $chunksTotal]);
            if (isset($result['mediaId'])) {
                return new MediaResponse($result);
            }
            if (isset($result['success']) && $result['success'] == false) {
                throw new UploadException($result['error']['message'], $result['error']['code']);
            }
            $fileId = $result['fileId'];
            ++$chunk;
        }
        if ($chunk == $chunksTotal - 1) {
            throw new UploadException('Uploaded all chunks, but something went wrong.');
        }
        if ($chunkData === false) {
            throw new UploadException('Could not read chunk '.$chunk.' from file "'.$pathname.'".');
        }
        throw new UploadException('Unknown upload error!');
    }
    }
