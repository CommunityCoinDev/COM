#include "checkupdate.h"

CheckUpdate::CheckUpdate(QObject *parent) : QObject(parent)
{
}

CheckUpdate::~CheckUpdate()
{
}

bool CheckUpdate::isUptodate(QString strCurrentVersion)
{
    QString url = "https://raw.githubusercontent.com/CommunityCoinDev/COM/master/version";
    QNetworkReply *response = m_WebCtrl.get(QNetworkRequest(QUrl(url)));
    QEventLoop event;
    connect(response, SIGNAL(finished()), &event, SLOT(quit()));
    event.exec();

    QString content = response->readAll();

    if( strCurrentVersion != content )
        return false;
    else
        return true;
}
