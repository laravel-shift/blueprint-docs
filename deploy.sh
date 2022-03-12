vendor/bin/jigsaw build production
npm run production
rsync -v -rz --checksum --delete build_production/ nginx:/var/www/blueprint.laravelshift.com/html
rm -rf build_production
