FROM node:12.10.0

RUN mkdir -p /workspace
WORKDIR /workspace

# ruby install prepare
RUN apt-get update && apt-get install -y \
    autoconf \
    bison \
    build-essential \
    libssl-dev \
    libyaml-dev \
    libreadline6-dev \
    zlib1g-dev \
    libncurses5-dev \
    libffi-dev \
    libgdbm3 \
    libgdbm-dev \
    git

# rbenv clone
RUN git clone https://github.com/sstephenson/rbenv.git /usr/local/rbenv
RUN git clone https://github.com/sstephenson/ruby-build.git /usr/local/rbenv/plugins/ruby-build

# rbnev setting
RUN echo 'export RBENV_ROOT="/usr/local/rbenv"' >> /etc/profile.d/rbenv.sh
RUN echo 'export PATH="${RBENV_ROOT}/bin:${PATH}"' >> /etc/profile.d/rbenv.sh
RUN echo 'eval "$(rbenv init --no-rehash -)"' >> /etc/profile.d/rbenv.sh

# ruby install
ENV ruby_version="2.3.3"
RUN . /etc/profile.d/rbenv.sh; rbenv install ${ruby_version}; rbenv global ${ruby_version};
RUN . /etc/profile.d/rbenv.sh; gem install -n /usr/local/bin compass --pre

# npm install
COPY package.json ./
RUN npm install -g gulp-cli
RUN npm install

CMD ["npx gulp"]