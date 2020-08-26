# Changelog
All notable changes to this project will be documented in this file.

The format of this changelog adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [3.1.1]
### Changed
- Moved the Folder::parentId property to the FolderResponse class since it's not used when creating folders and thus creates confusion.

## [3.1]
### Added
- Method to remove a user from one or several groups in QBank.

## [3.0.1]
### Changed
- Fixed bug where MediaResponse::getDeployedFile() could return a deployed file that belongs to another publish site than requested.

## [3.0]
### Changed
- API calls will default to https instead of http if no scheme is provided in the API url.

## [2.1.0]
### Added
- Added support for document, font and audio templates
- Added classification constants for MimeTypes
### Changed
- Made redirects stricts to avoid method not allowed issues
- Bugfix: upload files
- Bugfix: get deployed files
- Bugfix: split hierarchical values correctly
- Various minor bug fixes

## [2.0.3]
### Changed
- UTF-8 characters won't get escaped in request bodies

## [2.0.2]
### Added
- Discriminator ID on object types
- Property criteria operators
<pre>
    PropertyCriteria::NO_VALUE;
    PropertyCriteria::HAS_VALUE;
    PropertyCriteria::HIERARCHICAL_ANY;
    PropertyCriteria::HIERARCHICAL_ALL;
</pre>
- Functionality to search for folders in the same manner as search for media with offset, property values sorting etc.
<pre>
	// Example
	$folderSearch = new FolderSearch();
	$folderSearch
		->setOffset($offset)
		->setParentId(PACKAGE_FOLDER)
		->addPropertyRequest(new PropertyRequest(['systemName' => PROPERTY_SYSTEMNAME]))
		->setLimit($limit)
		->setSortFields([new SearchSort([
			'sortField' => SearchSort::FIELD_PROPERTY,
			'sortDirection' => SearchSort::DIRECTION_ASCENDING,
			'systemName' => FOLDER_SORT_PROPERTY
		])]);
		
	$folders = $this->qbankApi->search()->folderSearch($folderSearch)->getResults();
	
</pre>

## [2.0.1]
### Changed
- Removed delayed requests since they're slow and blocking
- Added option to fire and forget requests

## [2.0]
### Changed
- Bugfix: The delayed calls is now sent
- Updated the dependency Guzzle from version 5 to 6 to remain actual and provide the highest chance of compability with other projects.
- Returned return statements for all "void" functions due to compability issues. As it turns out, all functions documented as returning void in the API, aren't return void. 

## [1.4.1]
### Changed
- Reversed the removal of "void" returns.
  The removal was overzelous and removed a lot of returns of primitive types as well due to an error in the API specification.

## [1.4.0]
### Added
- Option to retrieve child medias when retrieving a media

<pre> 
	// v1.3.4
	$media = $this->qbankApi->media()->retrieveMedia($parameters['mediaId'], $cachePolicy);

	// v1.4.0
	$media = $this->qbankApi->media()->retrieveMedia($parameters['mediaId'], true, $cachePolicy);
</pre>

- Include child medias in each media when searching

<pre>
	$ms = new Search();
	$ms->setIncludeChildren(true);
</pre>

### Changed
- Updated the QBank3 API-wrapper from `v1.3.*` to `v1.4.*`

### Removed
- Return statements for void functions
