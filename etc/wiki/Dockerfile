FROM mediawiki:latest

RUN rm -rf /var/www/html/extensions

RUN git clone --depth 1 \
      https://github.com/wikimedia/mediawiki-extensions-Scribunto.git \
      /var/www/html/extensions/Scribunto \
      && chmod a+x /var/www/html/extensions/Scribunto/includes/engines/LuaStandalone/binaries/lua*_linux_*/lua

RUN git clone --depth 1 \
      https://github.com/wikimedia/mediawiki-extensions-WikiEditor.git \
      /var/www/html/extensions/WikiEditor

RUN git clone --depth 1 \
      https://github.com/wikimedia/mediawiki-extensions-ConfirmEdit.git \
      /var/www/html/extensions/ConfirmEdit

RUN git clone --depth 1 \
      https://github.com/wikimedia/mediawiki-extensions-MultimediaViewer.git \
      /var/www/html/extensions/MultimediaViewer

RUN git clone --depth 1 \
      https://github.com/wikimedia/mediawiki-extensions-Renameuser.git \
      /var/www/html/extensions/Renameuser

RUN git clone --depth 1 \
      https://github.com/wikimedia/mediawiki-extensions-CodeEditor.git \
      /var/www/html/extensions/CodeEditor

RUN git clone --depth 1 \
      https://github.com/wikimedia/mediawiki-extensions-CategoryTree.git \
      /var/www/html/extensions/CategoryTree