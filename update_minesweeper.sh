#!/usr/bin/env bash

cd ../minesweeper
git fetch origin && git reset --hard origin/master
mv dist/* ../website/public/assets/minesweeper/