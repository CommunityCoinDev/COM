#include "checkupdate.h"
#include <QTextStream>

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

    QString content = response->readAll().simplified();

    QTextStream out(stdout);
    out << "Checking for update. This version: " << strCurrentVersion << " - Server version " << content << endl;

    if( strCurrentVersion != content )
        return false;
    else
        return true;
}
