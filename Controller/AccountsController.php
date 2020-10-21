<?php

namespace QBNK\QBank\API\Controller;

use QBNK\QBank\API\CachePolicy;
use QBNK\QBank\API\Model\Functionality;
use QBNK\QBank\API\Model\Group;
use QBNK\QBank\API\Model\Role;
use QBNK\QBank\API\Model\User;

class AccountsController extends ControllerAbstract
{
    /**
     * Lists Functionalities available.
     *
     * Lists all Functionalities available
     *
     * @param bool        $includeDeleted indicates if we should include removed Functionalities in the result
     * @param CachePolicy $cachePolicy    a custom cache policy used for this request only
     *
     * @return Functionality[]
     */
    public function listFunctionalities($includeDeleted = false, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => ['includeDeleted' => $includeDeleted],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/accounts/functionalities', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new Functionality($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }

    /**
     * Fetches a specific Functionality.
     *
     * Fetches a Functionality by the specified identifier.
     *
     * @param int         $id          the Functionality identifier
     * @param CachePolicy $cachePolicy a custom cache policy used for this request only
     *
     * @return Functionality
     */
    public function retrieveFunctionality($id, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/accounts/functionalities/' . $id . '', $parameters, $cachePolicy);
        $result = new Functionality($result);

        return $result;
    }

    /**
     * Lists Groups available.
     *
     * Lists all Groups available
     *
     * @param bool        $includeDeleted indicates if we should include removed Groups in the result
     * @param CachePolicy $cachePolicy    a custom cache policy used for this request only
     *
     * @return Group[]
     */
    public function listGroups($includeDeleted = false, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => ['includeDeleted' => $includeDeleted],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/accounts/groups', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new Group($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }

    /**
     * Fetches a specific Group.
     *
     * Fetches a Group by the specified identifier.
     *
     * @param int         $id           the Group identifier
     * @param bool        $includeUsers
     * @param CachePolicy $cachePolicy  a custom cache policy used for this request only
     *
     * @return Group
     */
    public function retrieveGroup($id, $includeUsers = false, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => ['includeUsers' => $includeUsers],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/accounts/groups/' . $id . '', $parameters, $cachePolicy);
        $result = new Group($result);

        return $result;
    }

    /**
     * Fetches the currently logged in User.
     *
     * Effectively a whoami call.
     *
     * @param CachePolicy $cachePolicy a custom cache policy used for this request only
     *
     * @return User
     */
    public function retrieveCurrentUser(CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/accounts/me', $parameters, $cachePolicy);
        $result = new User($result);

        return $result;
    }

    /**
     * Lists Roles available.
     *
     * Lists all Roles available
     *
     * @param bool        $includeDeleted indicates if we should include removed Roles in the result
     * @param CachePolicy $cachePolicy    a custom cache policy used for this request only
     *
     * @return Role[]
     */
    public function listRoles($includeDeleted = false, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => ['includeDeleted' => $includeDeleted],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/accounts/roles', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new Role($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }

    /**
     * Fetches a specific Role.
     *
     * Fetches a Role by the specified identifier.
     *
     * @param int         $id          the Role identifier
     * @param CachePolicy $cachePolicy a custom cache policy used for this request only
     *
     * @return Role
     */
    public function retrieveRole($id, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/accounts/roles/' . $id . '', $parameters, $cachePolicy);
        $result = new Role($result);

        return $result;
    }

    /**
     * Fetches all settings.
     *
     * Fetches all settings currently available for the current user.
     *
     * @param CachePolicy $cachePolicy a custom cache policy used for this request only
     *
     * @return array
     */
    public function listSettings(CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/accounts/settings', $parameters, $cachePolicy);

        return $result;
    }

    /**
     * Fetches a setting.
     *
     * Fetches a setting for the current user.
     *
     * @param string      $key         The key of the setting to fetch..
     * @param CachePolicy $cachePolicy a custom cache policy used for this request only
     *
     * @return array
     */
    public function retrieveSetting($key, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/accounts/settings/' . $key . '', $parameters, $cachePolicy);

        return $result;
    }

    /**
     * Lists Users available.
     *
     * Lists all Users available
     *
     * @param bool        $includeDeleted indicates if we should include removed Users in the result
     * @param CachePolicy $cachePolicy    a custom cache policy used for this request only
     *
     * @return User[]
     */
    public function listUsers($includeDeleted = false, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => ['includeDeleted' => $includeDeleted],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/accounts/users', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new User($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }

    /**
     * Fetches a specific User.
     *
     * Fetches a User by the specified identifier.
     *
     * @param int         $id          the User identifier
     * @param CachePolicy $cachePolicy a custom cache policy used for this request only
     *
     * @return User
     */
    public function retrieveUser($id, CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/accounts/users/' . $id . '', $parameters, $cachePolicy);
        $result = new User($result);

        return $result;
    }

    /**
     * Search for users by email.
     *
     * @param string      $byEmail     search for users by email
     * @param string      $userType    which user types to consider
     * @param CachePolicy $cachePolicy a custom cache policy used for this request only
     *
     * @return User[]
     */
    public function searchUsers($byEmail, $userType = 'all_users', CachePolicy $cachePolicy = null)
    {
        $parameters = [
            'query' => ['byEmail' => $byEmail, 'userType' => $userType],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->get('v1/accounts/users/search', $parameters, $cachePolicy);
        foreach ($result as &$entry) {
            $entry = new User($entry);
        }
        unset($entry);
        reset($result);

        return $result;
    }

    /**
     * Creates a new setting.
     *
     * Creates a new, previously not existing setting.
     *
     * @param string $key   The key (identifier) of the setting
     * @param string $value The value of the setting
     */
    public function createSetting($key, $value)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['key' => $key, 'value' => $value], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/accounts/settings', $parameters);

        return $result;
    }

    /**
     * Create a user Create a user in QBank.
     *
     * @param User   $user                  The user to create
     * @param string $password              Password for the new user, leave blank to let QBank send a password-reset link to the user
     * @param string $redirectTo            Only used if leaving $password blank, a URL to redirect the user to after setting his/hers password
     * @param bool   $sendNotificationEmail Send a notification email to the new user, as specified through the QBank backend
     *
     * @return User
     */
    public function createUser(User $user, $password = null, $redirectTo = null, $sendNotificationEmail = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['user' => $user, 'password' => $password, 'redirectTo' => $redirectTo, 'sendNotificationEmail' => $sendNotificationEmail], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/accounts/users', $parameters);
        $result = new User($result);

        return $result;
    }

    /**
     * Update a user Update a user in QBank.
     *
     * @param int    $id
     * @param User   $user     The user to update
     * @param string $password Set a new password for the user, leave blank to leave unchanged
     *
     * @return User
     */
    public function updateUser($id, User $user, $password = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['user' => $user, 'password' => $password], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/accounts/users/' . $id . '', $parameters);
        $result = new User($result);

        return $result;
    }

    /**
     * Add the user to one or more groups.
     *
     * @param int   $id
     * @param int[] $groupIds an array of int values
     *
     * @return User
     */
    public function addUserToGroup($id, array $groupIds)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['groupIds' => $groupIds], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/accounts/users/' . $id . '/groups', $parameters);
        $result = new User($result);

        return $result;
    }

    /**
     * Update the last login time for a user Update the last login time for a user.
     *
     * @param int  $id
     * @param bool $successful Login attempt successful or not
     *
     * @return User
     */
    public function updateLastLogin($id, $successful = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['successful' => $successful], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/accounts/users/' . $id . '/registerloginattempt', $parameters);
        $result = new User($result);

        return $result;
    }

    /**
     * Dispatch a password reset mail to a user.
     *
     * . The supplied link will be included in the mail and appended with a "hash=" parameter containing the password reset hash needed to set the new password in step 2.
     *
     * @param int    $id   the User identifier
     * @param string $link Optional link to override redirect to in the password reset mail
     */
    public function sendPasswordReset($id, $link = null)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['link' => $link], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/accounts/users/' . $id . '/resetpassword', $parameters);

        return $result;
    }

    /**
     * Reset a password for a user with password reset hash.
     *
     * Resets a password for a user with a valid password reset hash. Hash should be obtained through "/users/{id}/sendpasswordreset".
     *
     * @param string $hash     Valid password reset hash
     * @param string $password New password
     *
     * @return array
     */
    public function resetPassword($hash, $password)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['hash' => $hash, 'password' => $password], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->post('v1/accounts/users/resetpassword', $parameters);

        return $result;
    }

    /**
     * Updates an existing setting.
     *
     * Updates a previously created setting.
     *
     * @param string $key   The key (identifier) of the setting..
     * @param string $value The value of the setting
     */
    public function updateSetting($key, $value)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode(['value' => $value], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->put('v1/accounts/settings/' . $key . '', $parameters);

        return $result;
    }

    /**
     * Removes an existing setting.
     *
     * Updates a previously created setting.
     *
     * @param string $key The key (identifier) of the setting..
     */
    public function removeSetting($key)
    {
        $parameters = [
            'query' => [],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->delete('v1/accounts/settings/' . $key . '', $parameters);

        return $result;
    }

    /**
     * Remove the user from one or more groups.
     *
     * @param int    $id
     * @param string $groupIds a comma separated string of group ids we should remove the user from
     *
     * @return User
     */
    public function removeUserFromGroup($id, $groupIds)
    {
        $parameters = [
            'query' => ['groupIds' => $groupIds],
            'body' => json_encode([], JSON_UNESCAPED_UNICODE),
            'headers' => [],
        ];

        $result = $this->delete('v1/accounts/users/' . $id . '/groups', $parameters);
        $result = new User($result);

        return $result;
    }
}
