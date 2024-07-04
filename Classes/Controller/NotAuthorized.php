<?php
declare(strict_types=1);
namespace Hda\Hda\PageHandler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Error\PageErrorHandler\PageErrorHandlerInterface;
use TYPO3\CMS\Core\Http\ServerRequest;
use TYPO3\CMS\Core\Http\RedirectResponse;
use TYPO3\CMS\Core\Http\Uri;
use TYPO3\CMS\Core\Site\Entity\Site;
use TYPO3\CMS\Core\Site\Entity\SiteLanguage;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class NotAuthorized
 * to show a login page (in fitting language) and redirect to page after login
 * @noinspection PhpUnused
 */
class NotAuthorized implements PageErrorHandlerInterface
{
    
    /**
     * @var ServerRequestInterface
     */
    protected $request = null;
    
    /**
     * @param ServerRequestInterface $request
     * @param string $message
     * @param array $reasons
     * @return ResponseInterface
     */
    public function handlePageError(
        ServerRequestInterface $request,
        string $message,
        array $reasons = []
        ): ResponseInterface {
            $this->request = $request;
            return new RedirectResponse($this->getLoginUrl(), 302);
    }
    
    /**
     * @return string
     */
    protected function getLoginUrl(): string
    {
        $loginPageUid = 0;
        $site = null;
        
        // check if get parameter id is available
        $id = (int)\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('id');
        if ($id > 0) {
            $siteFinder = GeneralUtility::makeInstance(SiteFinder::class);
            $site = $siteFinder->getSiteByPageId($id);
            $loginPageUid = $site->getConfiguration()['pageLoginUid'];
        }
        
        // if get parameter id unavailable (e.g. uri only has slug of restricted page), go via request object in $this->request
        if ($this->request instanceof ServerRequest 
            && isset($this->request->getAttributes()['site']) 
            && $this->request->getAttributes()['site'] instanceof Site
            && is_array($this->request->getAttributes()['site']->getConfiguration())
            && isset($this->request->getAttributes()['site']->getConfiguration()['pageLoginUid'])) {
            $site = $this->request->getAttributes()['site'];
            $loginPageUid = $this->request->getAttributes()['site']->getConfiguration()['pageLoginUid'];
        }
        
        // if login page uid could be determined, build uri to login page uid with current uri as redirect_url
        if ($loginPageUid > 0) {
            $uri = $site->getRouter()->generateUri(
                $loginPageUid, 
                ['_language' => $this->getLanguageIdentifier(), 'redirect_url' => $this->request->getUri()->__toString()]
            );
            return $uri->__toString();
        }
        // if login page uid could not be determined, we just redirect to /
        return '/';
    }
    
    /**
     * @return int
     */
    protected function getLanguageIdentifier(): int
    {
        /** @var SiteLanguage $language */
        $language = $this->request->getAttribute('language');
        return $language->getLanguageId();
    }
}