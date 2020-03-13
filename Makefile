# This file is licensed under the Affero General Public License version 3 or
# later. See the COPYING file.
app_name=$(notdir $(CURDIR))
project_directory=$(CURDIR)/../$(app_name)
build_tools_directory=$(CURDIR)/build/tools
source_build_directory=$(CURDIR)/build/artifacts/source
source_package_name=$(source_build_directory)/$(app_name)
appstore_build_directory=$(CURDIR)/build/artifacts/appstore
appstore_package_name=$(appstore_build_directory)/$(app_name)

all: dev-setup lint build-js-production test-php

# Dev env management
dev-setup: clean clean-dev npm-init

npm-init:
	npm ci

npm-update:
	npm update

composer-update:
	composer update

install-deps: install-composer-deps-dev npm-init

install-composer-deps:
	composer install --no-dev -o

install-composer-deps-dev:
	composer install -o

# Building
build-js:
	npm run dev

build-js-production:
	npm run build

watch-js:
	npm run watch

# Testing
test:
	npm run test

test-watch:
	npm run test:watch

test-coverage:
	npm run test:coverage

test-php:
	composer run test:unit
	composer run test:integration

test-php-coverage:
	composer run test:unit -- --coverage-clover=coverage-unit.xml
	composer run test:integration -- --coverage-clover=coverage-integration.xml

# Linting
lint:
	npm run lint

lint-fix:
	npm run lint:fix

# Style linting
stylelint:
	npm run stylelint

stylelint-fix:
	npm run stylelint:fix

php-lint:
	composer run lint

php-lint-fix:
	composer run lint:fix

# Code quality
php-analyze:
	composer run phan

# Pre-commit
lint-all: lint-fix lint stylelint-fix stylelint php-lint-fix php-lint

pre-commit: lint-all php-analyze

# Cleaning
clean:
	rm -f js/*
	rm -f js/*
	rm -Rf js/chunks

clean-dev:
	rm -rf node_modules
