package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class TestAdminAddNewForumSubjectAndDeleteIt {
  private WebDriver driver;
  private String baseUrl;
  private boolean acceptNextAlert = true;
  private StringBuffer verificationErrors = new StringBuffer();

  @Before
  public void setUp() throws Exception {
    driver = new FirefoxDriver();
    baseUrl = "https://www.google.com/";
    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
  }

  @Test
  public void testAdminAddNewForumSubjectAndDeleteIt() throws Exception {
    driver.get("http://127.0.0.1:8080/login");
    driver.findElement(By.id("username")).click();
    driver.findElement(By.id("username")).clear();
    driver.findElement(By.id("username")).sendKeys("admin");
    driver.findElement(By.id("password")).click();
    driver.findElement(By.id("password")).clear();
    driver.findElement(By.id("password")).sendKeys("root");
    driver.findElement(By.id("_submit")).click();
    driver.findElement(By.linkText("Accès à l'administration")).click();
    assertEquals("Forum - admin", driver.findElement(By.xpath("//nav[@id='mainNav']/div/a")).getText());
    driver.findElement(By.xpath("//div[@id='wf_forum_admin']/div/div[2]/a/span")).click();
    driver.findElement(By.id("admin_forum_name")).click();
    driver.findElement(By.id("admin_forum_name")).clear();
    driver.findElement(By.id("admin_forum_name")).sendKeys("Test");
    driver.findElement(By.id("admin_forum_subforum_0_name")).click();
    driver.findElement(By.id("admin_forum_subforum_0_name")).clear();
    driver.findElement(By.id("admin_forum_subforum_0_name")).sendKeys("test2");
    driver.findElement(By.id("admin_forum_submit")).click();
    assertEquals("Test", driver.findElement(By.linkText("Test")).getText());
    assertEquals("Enregistrement effectués", driver.findElement(By.xpath("//div[@id='wf_forum_content']/div/ul/li")).getText());
    driver.findElement(By.linkText("← Retour au forum")).click();
    assertEquals("Test", driver.findElement(By.xpath("//div[@id='wf_forum']/div[3]/h1")).getText());
    assertEquals("test2", driver.findElement(By.linkText("test2")).getText());
    driver.findElement(By.linkText("Accès à l'administration")).click();
    driver.findElement(By.linkText("Test")).click();
    acceptNextAlert = true;
    driver.findElement(By.linkText("Supprimer ce forum")).click();
    driver.get("http://127.0.0.1:8080/forum/");
  }

  @After
  public void tearDown() throws Exception {
    driver.quit();
    String verificationErrorString = verificationErrors.toString();
    if (!"".equals(verificationErrorString)) {
      fail(verificationErrorString);
    }
  }

  private boolean isElementPresent(By by) {
    try {
      driver.findElement(by);
      return true;
    } catch (NoSuchElementException e) {
      return false;
    }
  }

  private boolean isAlertPresent() {
    try {
      driver.switchTo().alert();
      return true;
    } catch (NoAlertPresentException e) {
      return false;
    }
  }

  private String closeAlertAndGetItsText() {
    try {
      Alert alert = driver.switchTo().alert();
      String alertText = alert.getText();
      if (acceptNextAlert) {
        alert.accept();
      } else {
        alert.dismiss();
      }
      return alertText;
    } finally {
      acceptNextAlert = true;
    }
  }
}
