<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/database">
    <xsl:copy>
        <xsl:copy-of select="@*"/>
        <xsl:apply-templates/>
    </xsl:copy>
</xsl:template>

<xsl:template match="table">
    <xsl:variable name="name" select="@name"/>
    <xsl:copy>
        <xsl:copy-of select="@*"/>
        <xsl:copy-of select="*"/>
        <xsl:copy-of select="document($validators)/validators/table[@name=$name]/*"/>
    </xsl:copy>
</xsl:template>

</xsl:stylesheet>
