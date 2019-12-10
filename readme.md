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
  ``` BASH
  docker pull docker.elastic.co/elasticsearch/elasticsearch:6.7.2
  ```
	#### Running Elasticsearch from the command line
  ##### Development mode
  Elasticsearch can be quickly started for development or testing use with the following command:
  ```BASH
  docker run -p 9200:9200 -p 9300:9300 -e "discovery.type=single-node" docker.elastic.co/elasticsearch/elasticsearch:6.7.2
  ```
	##### Production mode
	[Config for Production with docker](https://www.elastic.co/guide/en/elasticsearch/reference/6.8/docker.html#docker-cli-run-prod-mode)

## Config

add the following to .env
```
SCOUT_DRIVER=elastic
```
