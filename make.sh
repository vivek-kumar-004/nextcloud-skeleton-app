#!/bin/sh

# Copyright (c) 2020 abijeetpatro <abijeetpatro@gmail.com>
#
# @license GNU AGPL version 3 or any later version
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as
# published by the Free Software Foundation, either version 3 of the
# License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU Affero General Public License for more details.
#
# You should have received a copy of the GNU Affero General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.

# This script is a wrapper to run the Make command inside the docker

PROGRAM_NAME=$0

usage () {
    echo "usage: $PROGRAM_NAME [docker_name] [make_command, eg: clean, build etc.]"
    exit 1
}

[ -z $1 ] && { usage; }

DOCKER_NAME=$1
COMMAND=$2;
DIRSCRIPT=$(dirname "$(readlink -f "$0")")
APP="$(basename -- $DIRSCRIPT)";

FULL_COMMAND="make --directory=/var/www/html/apps/$APP/ $COMMAND"
echo "Running '$FULL_COMMAND' in docker - '$DOCKER_NAME'";
printf "=%.0s"  $(seq 1 120)
echo '';

docker exec -it $DOCKER_NAME bash -c "source ~/.bashrc && $FULL_COMMAND"
