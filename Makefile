#! /usr/bin/make
help:         ## show help
	@cat Makefile | grep "##." | sed '2d;s/##//;s/://'

test1:        ## run test for challenge 1
	./vendor/bin/phpunit ./challenge-01

test2:        ## run test for challenge 2
	./vendor/bin/phpunit ./challenge-02
