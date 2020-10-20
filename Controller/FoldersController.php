<?php

namespace QBNK\QBank\API\Controller;

use QBNK\QBank\API\CachePolicy;
use QBNK\QBank\API\Model\Folder;
use QBNK\QBank\API\Model\FolderParent;
use QBNK\QBank\API\Model\FolderResponse;

class FoldersController extends ControllerAbstract
{
    /**
     * Lists all Folders.
     *
     * Lists all the Folders that the current user has access to.
     *
     * @param int         $root                The identifier of a Folder to be treated as the root. Use zero for the absolute root. The root will not be included in the result..
     * @param int         $depth               The depth for which to include existing subfolders. Use zero to exclude them all together..
     * @param bool        $includeProperties   Whether to return the properties for each folder..
     * @param bool        $includeObjectCounts Whether to return the number of objects each folder contains..
     * @param CachePolicy $cachePolicy         a custom cache policy used for this request only
     *
     * @return FolderResponse[]
     */
    public function listFolders($root = 0, $depth = 0, $includeProperties = true, $includeObjectCounts = false, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => ['root' => $root, 'depth' => $depth, 'includeProperties' => $includeProperties, 'includeObjectCounts' => $includeObjectCounts],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/folders', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new FolderResponse($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }

    /**
     * Fetches a specific Folder.
     *
     * Fetches a Folder by the specified identifier.
     *
     * @param int         $id                  The Folder identifier..
     * @param int         $depth               The depth for which to include existing subfolders. Use zero to exclude them all together..
     * @param bool        $includeProperties   Whether to return the properties for each folder..
     * @param bool        $includeObjectCounts Whether to return the number of objects each folder contains..
     * @param CachePolicy $cachePolicy         a custom cache policy used for this request only
     *
     * @return FolderResponse
     */
    public function retrieveFolder($id, $depth = 0, $includeProperties = true, $includeObjectCounts = false, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => ['depth' => $depth, 'includeProperties' => $includeProperties, 'includeObjectCounts' => $includeObjectCounts],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/folders/' . $id . '', $parameters, $cachePolicy);
        $result = new FolderResponse($result);

        return $result;
    }

    /**
     * Lists all parent Folders until the absolute root.
     *
     * Lists all parent Folders from the specified to the absolute root, with distances.
     *
     * @param int         $id          the Folder identifier
     * @param CachePolicy $cachePolicy a custom cache policy used for this request only
     *
     * @return FolderParent[]
     */
    public function retrieveParents($id, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/folders/' . $id . '/parents', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new FolderParent($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }

    /**
     * Create a Folder.
     *
     * @param Folder $folder        A JSON encoded Folder to create
     * @param int    $parentId      An optional parent folder ID. Will otherwise be created in the root level. Note that root level creation requires additional access!.
     * @param bool   $inheritAccess Decides whether this Folder will inherit access from its parent folder
     *
     * @return FolderResponse
     */
    public function createFolder(Folder $folder, $parentId = 0, $inheritAccess = null)
    {
        $parameters = [
            'query' => ['parentId' => $parentId],
            'body' => json_encode(['folder' => $folder, 'inheritAccess' => $inheritAccess], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/folders', $parameters);
        $result = new FolderResponse($result);

        return $result;
    }

    /**
     * Add Media to Folder.
     *
     * @param int   $folderId folder to add media to
     * @param int[] $mediaIds an array of int values
     *
     * @return array
     */
    public function addMediaToFolder($folderId, array $mediaIds)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['mediaIds' => $mediaIds], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/folders/' . $folderId . '/media', $parameters);

        return $result;
    }

    /**
     * Update a Folder. Move a folder by updating the parent folder id.
     *
     * Update a Folder.
     *
     * @param int            $id     the Folder identifier
     * @param FolderResponse $folder A JSON encoded Folder representing the updates
     *
     * @return FolderResponse
     */
    public function updateFolder($id, FolderResponse $folder)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['folder' => $folder], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/folders/' . $id . '', $parameters);
        $result = new FolderResponse($result);

        return $result;
    }

    /**
     * Remove Media from Folder.
     *
     * @param int $folderId folder to remove media from
     * @param int $mediaId  media to remove from specified folder
     *
     * @return array
     */
    public function removeMediaFromFolder($folderId, $mediaId)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->delete('v1/folders/' . $folderId . '/media/' . $mediaId . '', $parameters);

        return $result;
    }

    /**
     * Delete a Folder.
     *
     * Delete a Folder and all subfolders. Will NOT delete Media attached to the Folder.
     *
     * @param int $id the Folder identifier
     *
     * @return FolderResponse
     */
    public function removeFolder($id)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->delete('v1/folders/' . $id . '', $parameters);
        $result = new FolderResponse($result);

        return $result;
    }
}
