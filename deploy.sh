vendor/bin/jigsaw build production
npm run production
rsync -v -rz --checksum --delete build_production/ web:/var/www/blueprint.laravelshift.com/public
rm -rf build_production
