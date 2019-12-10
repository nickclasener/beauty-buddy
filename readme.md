<h1 align="center">Readme</h1>


<!-- @import "[TOC]" {cmd="toc" depthFrom=1 depthTo=6 orderedList=false} -->

<!-- code_chunk_output -->

- [Introduction](#introduction)
- [Server Requirements](#server-requirements)
- [Installation](#installation)
- [Config](#config)

<!-- /code_chunk_output -->
## Introduction
Beautybuddy is a crm for a small beauty parlor.

The main tools used to build this.
- Laravel
- PHPUnit
- Elasticsearch
- Tailwindcss
- StimulusJs
- Turbolinks

## Server Requirements
- PHP 7.2+ or newer
- HTTP server with PHP support (eg: Apache, Nginx, Caddy)
- Composer
- MySQL
- Laravel
- Docker *(Optional but recommended)*
- Elasticsearch

## Installation

- [Laravel installation](https://laravel.com/docs/5.8/installation)
- [Elasticsearch installation](https://www.elastic.co/guide/en/elasticsearch/reference/6.7/install-elasticsearch.html)
- [Docker installation ](https://gist.github.com/rstacruz/297fc799f094f55d062b982f7dac9e41) for Linux, MacOS, and Windows.
- [Elasticsearch with Docker installation](https://www.elastic.co/guide/en/elasticsearch/reference/6.8/docker.html)
  ##### pulling the image
	Obtaining Elasticsearch for Docker is as simple as issuing a docker pull command against the Elastic Docker registry.
  ```BASH
  docker pull docker.elastic.co/elasticsearch/elasticsearch:6.7.2
  ```
	#### Running Elasticsearch from the command line
  ##### Development mode
  Elasticsearch can be quickly started for development or testing use with the following command:
  ```BASH
  docker run -p 9200:9200 -p 9300:9300 -e "discovery.type=single-node" docker.elastic.co/elasticsearch/elasticsearch:6.7.2
  # or run in project home folder
  bb-elastic-docker
  ```
	##### Production mode
	[Config for Production with docker](https://www.elastic.co/guide/en/elasticsearch/reference/6.8/docker.html#docker-cli-run-prod-mode)

## Config
Add the following to .env
```BASH
SCOUT_DRIVER=elastic
```
The following .sh files are in the home directory to config elasticsearch.
```BASH
bb-elastic-create
bb-elastic-docker
bb-elastic-drop
bb-elastic-flush
bb-elastic-import
bb-elastic-update
bb-elastic-update-mapping
```
For more info on what these commands do visit [babenkoivan/scout-elasticsearch-driver v3.12](https://github.com/babenkoivan/scout-elasticsearch-driver/tree/v3.12.0)
