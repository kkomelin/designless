Designless
============

[Bootstrap 3](https://github.com/twbs/bootstrap-sass) powered Drupal 7 theme with minimalistic design intended for personal blogs and other content centered sites.

###How to develop (preferably)

1. Install [Ruby] (https://www.ruby-lang.org/en/installation/) and [node.js] (http://nodejs.org/)

2. Install necessary gems: ```gem install bootstrap-sass compass```

3. Install necessary node.js packages (package.json): ```npm install```

4. Install and enable [LiveReload browser plugin](http://feedback.livereload.com/knowledgebase/articles/86242-how-do-i-install-and-use-the-browser-extensions-)

5. Start watching for changes (Gruntfile.js): ```grunt```  
Any changes in scss will cause their recompilation.
Any changes in scss, js and templates will cause page reload.

Note: you may skip steps 3-5 if you prefer using ```compass watch``` command to recompile sass/*.scss files.

###How to develop (traditionally)

It's possible to make changes directly in stylesheets/styles.css file without scss -> css recompilation if you prefer traditional CSS-based development approach.
