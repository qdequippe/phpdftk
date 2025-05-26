.PHONY: build bash install update cs

DOCKER_COMPOSE=docker compose
PHP_CS_FIXER=./vendor/bin/php-cs-fixer
RECTOR=./tools/bin/rector

GREEN := \033[0;32m
BLUE := \033[1;34m
NC := \033[0m

help:
	@echo ""
	@echo "$(BLUE)Available commands:$(NC)"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "  $(GREEN)%-15s$(NC) %s\n", $$1, $$2}'
	@echo ""

build: ## Build PHP service (Docker)
	COMPOSE_BAKE=true $(DOCKER_COMPOSE) build

bash: ## Enter php container
	$(DOCKER_COMPOSE) run -it --rm php bash

install: ## Install project dependencies
	$(DOCKER_COMPOSE) run --rm php composer install

update: ## Update project dependencies
	$(DOCKER_COMPOSE) run --rm php composer update

cs_fix: ## Run PHP CS Fixer
	$(DOCKER_COMPOSE) run --rm php $(PHP_CS_FIXER) fix

cs_check: ## Run PHP CS Fixer (dry run)
	$(DOCKER_COMPOSE) run --rm php $(PHP_CS_FIXER) check --diff

test: ## Run testsuite (PHPUnit)
	$(DOCKER_COMPOSE) run --rm php ./vendor/bin/phpunit

coverage: ## Run testsuite (PHPUnit) with HTML coverage
	$(DOCKER_COMPOSE) run --rm -e XDEBUG_MODE=coverage  php ./vendor/bin/phpunit --coverage-html build/coverage

phpstan: ## Run PHPStan
	$(DOCKER_COMPOSE) run --rm php ./vendor/bin/phpstan analyse

phpstan-baseline: ## Run PHPStan (with baseline generation)
	$(DOCKER_COMPOSE) run --rm php ./vendor/bin/phpstan analyse -b

rector: ## Run Rector (dry run)
	$(DOCKER_COMPOSE) run --rm php $(RECTOR) --dry-run

rectify: ## Run Rector
	$(DOCKER_COMPOSE) run --rm php $(RECTOR)

quality: rector cs_check test
