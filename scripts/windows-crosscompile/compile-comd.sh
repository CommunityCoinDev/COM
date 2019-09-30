#!/bin/bash -ev


MXE_PATH=/opt/mxe
export PATH=$MXE_PATH/usr/bin:$PATH


MXE_INCLUDE_PATH=$MXE_PATH/usr/x86_64-w64-mingw32.static/include
MXE_LIB_PATH=$MXE_PATH/usr/x86_64-w64-mingw32.static/lib

x86_64-w64-mingw32.static-qmake-qt5 \
        BOOST_LIB_SUFFIX=-mt \
        BOOST_THREAD_LIB_SUFFIX=_win32-mt \
        BOOST_INCLUDE_PATH=$MXE_INCLUDE_PATH/boost \
        BOOST_LIB_PATH=$MXE_LIB_PATH \
        OPENSSL_INCLUDE_PATH=$MXE_INCLUDE_PATH/openssl \
        OPENSSL_LIB_PATH=$MXE_LIB_PATH \
        BDB_INCLUDE_PATH=$MXE_INCLUDE_PATH \
        BDB_LIB_PATH=$MXE_LIB_PATH \
	USE_UPNP=0 \
	USE_BUILD_INFO=1 \
        MINIUPNPC_INCLUDE_PATH=$MXE_INCLUDE_PATH \
        MINIUPNPC_LIB_PATH=$MXE_LIB_PATH \
	DEFINES+="USE_PTHREADS USE_UPNP=0" \
        QMAKE_LRELEASE=$MXE_PATH/usr/x86_64-w64-mingw32.static/qt5/bin/lrelease ../../communitycoin-qt.pro

rm -Rf ../../build/*
cd ../../src/leveldb/
make clean
cd ../../scripts/windows-crosscompile/
make clean
make -j$(nproc) -f Makefile.Release
#make -j$(nproc) -f Makefile

