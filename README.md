# Installation

Run:
```
git clone <repository_url>
composer install --no-dev --optimize-autoloader
php bin/console cache:clear
```

# Usage

## 1. Basic statistical data for one repository
```
GET /api/stats/{owner}/{name}
```
Examples:
```
GET /api/stats/facebook/react
GET /api/stats/vuejs/vue
```

## 2. Basic comparison for two repositories
*this feature is not finished yet*
```
GET /api/compare/first/{firstOwner}/{firstRepo}/second/{secondOwner}/{secondRepo}
```
Example:
```
GET /api/compare/first/facebook/react/second/vuejs/vue
```