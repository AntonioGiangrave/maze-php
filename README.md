# A-Maze-ingly Retro Route Puzzle

## Build images
```
docker build -t mytest .
```

## Build application
```
docker run -v $(pwd):/mnt -p 9090:9090 -w /mnt mytest ./scripts/build.sh
```

## Run Test
```
docker run -v $(pwd):/mnt -p 9090:9090 -w /mnt mytest ./scripts/test.sh
```

## Example Run
```
docker run -v $(pwd):/mnt -p 9090:9090 -w /mnt mytest ./scripts/run.sh map02.json 4 "Knife,Pillow"
```
