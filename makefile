image: ##create images
    docker build -t mytest .

build:
    docker run -v $(pwd):/mnt -p 9090:9090 -w /mnt mytest ./scripts/build.sh

tests:  docker run -v $(pwd):/mmt -p 9090:9090 -w /mnt mytest ./scripts/tests.sh

run:    docker run -v $(pwd):/mnt -p 9090:9090 -w /mnt mytest ./scripts/run.sh
