FROM alpine:latest
LABEL Description="RKN container"
WORKDIR /home/

COPY rkn.sh ./

RUN apk add --no-cache wget unzip bash grep && \
    chmod -R 777 rkn.sh && \
    echo '0  *  *  *  *    /home/rkn.sh' > /etc/crontabs/root
#    wget -P /home/zapret https://github.com/zapret-info/z-i/archive/master.zip && \
#    unzip /home/zapret/master.zip -d /home/zapret/ && \
#    mv /home/zapret/z-i-master/* /home/zapret/ && \
#    rm -r /home/zapret/z-i-master && \
#    rm /home/zapret/master.zip && \
#    rm /home/zapret/column && \
#    grep -o '[0-9]\{1,3\}\.[0-9]\{1,3\}\.[0-9]\{1,3\}\.[0-9]\{1,3\}' /home/zapret/dump.csv | sort -u -k1,1> /home/zapret/column


#CMD ["bash", "rkn.sh"]
CMD ["crond", "-f"]






